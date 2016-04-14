<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Mail;
use AppBundle\Entity\Person;
use AppBundle\Manager\Mailer;
use Doctrine\ORM\EntityManager;
use Dunglas\ApiBundle\Event\DataEvent;

/**
 * Listens on person creation.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class PersonEventListener
{
    private $mailFrom;
    private $mailer;
    private $entityManager;

    /**
     * @param $mailFrom
     * @param Mailer $mailer
     */
    public function __construct($mailFrom, Mailer $mailer, EntityManager $entityManager)
    {
        $this->mailFrom = $mailFrom;
        $this->mailer = $mailer;
        $this->entityManager = $entityManager;
    }

    /**
     * Send password and login to the user just create.
     *
     * @param DataEvent $event
     */
    public function onPrePersonCreate(DataEvent $event)
    {
        $object = $event->getData();

        if (!$object instanceof Person) {
            return;
        }

        $mail = new Mail();
        $mail->setSender($this->mailFrom);
        $mail->addRecipient($object);
        $mail->setDate(new \DateTime());
//        $this->mailer->accountCreateMailer($mail);

        return;
    }

    /**
     * Send email if email or password was changed.
     *
     * @param DataEvent $event
     */
    public function onPrePersonUpdate(DataEvent $event)
    {
        $object = $event->getData();

        if (!$object instanceof Person) {
            return;
        }

        if ($object->getPlainPassword() !== null) {
            $mail = new Mail();
            $mail->setSender($this->mailFrom);
            $mail->addRecipient($object);
            $mail->setDate(new \DateTime());
//            $this->mailer->passwordUpdateMailer($mail);

            return;
        }
    }

    /**
     * Send email if email was changed.
     *
     * @param DataEvent $event
     */
    public function onPostPersonUpdate(DataEvent $event)
    {
        $object = $event->getData();

        if (!$object instanceof Person) {
            return;
        }

        $originalEvent = $this->entityManager->getUnitOfWork()->getOriginalEntityData($object);

        if ($object->getEmail() !== $originalEvent->getEmail()) {
            $mail = new Mail();
            $mail->setSender($this->mailFrom);
            $mail->addRecipient($object);
            $mail->setDate(new \DateTime());
//            $this->mailer->emailUpdateMailer($mail);

            return;
        }
    }
}
