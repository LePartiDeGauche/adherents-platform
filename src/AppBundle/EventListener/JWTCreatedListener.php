<?php

namespace AppBundle\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Description of JWTCreatedListener.
 */
class JWTCreatedListener
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @param JWTCreatedEvent $event
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        if (!$event->getRequest()) {
            return;
        }

        $user = $this->tokenStorage->getToken()->getUser();
        $payload = $event->getData();
        $payload['@id'] = $user->getId();
        $payload['roles'] = $user->getRoles();
        $payload['lastName'] = $user->getLastName();
        $payload['firstName'] = $user->getFirstName();

        $event->setData($payload);
    }
}
