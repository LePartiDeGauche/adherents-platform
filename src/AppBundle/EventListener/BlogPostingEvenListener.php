<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\BlogPosting;
use Dunglas\ApiBundle\Event\DataEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class BlogPostingEvenListener
{
    private $tokenStorageInterface;

    /**
     * @param TokenStorageInterface $tokenStorageInterface
     */
    public function __construct(TokenStorageInterface $tokenStorageInterface)
    {
        $this->tokenStorageInterface = $tokenStorageInterface;
    }

    /**
     * @param DataEvent $event
     */
    public function BlogPostingEvenListener(DataEvent $event)
    {
        $object = $event->getData();

        if (!$object instanceof BlogPosting) {
            return;
        }

        if (null === $object->getUser()) {
            $currentUser = $this->tokenStorageInterface->getToken()->getUser();
            $object->setAuthor($currentUser);
        }

        $object->setDateCreated(new \DateTime());
        return;
    }
}