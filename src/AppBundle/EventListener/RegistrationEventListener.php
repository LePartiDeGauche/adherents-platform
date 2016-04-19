<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Registration;
use Dunglas\ApiBundle\Event\DataEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RegistrationEventListener
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
    public function onPreRegistrationCreate(DataEvent $event)
    {
        $object = $event->getData();

        if (!$object instanceof Registration) {
            return;
        }

        if (null === $object->getUser()) {
            $currentUser = $this->tokenStorageInterface->getToken()->getUser();
            $object->setAuthor($currentUser);
        }

        return;
    }
}
