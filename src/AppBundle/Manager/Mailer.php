<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Mail;
use Symfony\Component\Templating\EngineInterface;

/**
 * Mailer.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class Mailer
{
    private $mailer;
    private $templating;
    private $url;
    private $mailFrom;

    /**
     * @param \Swift_Mailer $mailer
     * @param EngineInterface $templating
     * @param $url
     * @param $mailFrom
     */
    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating, $url, $mailFrom)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->url = $url;
        $this->mailFrom = $mailFrom;
    }

    /**
     * Send an email after account creation.
     *
     * @param Mail $mail
     */
    public function accountCreateMailer(Mail $mail)
    {
        if (!$mail->getSender()){
            $mail->setSender($this->mailFrom);
        }
        
        $recipients = $mail->getRecipients();
        foreach ($recipients as $recipient) {
            $content = $this->templating->render(':mail:account_create.txt.twig', [
                'lastName' => $recipient->getLastName(),
                'firstName' => $recipient->getFirstName(),
                'email' => $recipient->getEmail(),
                'password' => $recipient->getPlainPassword(),
                'url' => $this->url,
            ]);
            list($subject, $body) = explode("\n", $content, 2);
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($mail->getSender())
                ->setTo($recipient->getEmail())
                ->setBody(trim($body))
            ;
            $this->mailer->send($message);
        }
    }

    /**
     * Send an email after update of the password.
     *
     * @param Mail $mail
     */
    public function passwordUpdateMailer(Mail $mail)
    {
        if (!$mail->getSender()){
            $mail->setSender($this->mailFrom);
        }

        $recipients = $mail->getRecipients();
        foreach ($recipients as $recipient) {
            $content = $this->templating->render(':mail:password_update.txt.twig', [
                'lastName' => $recipient->getLastName(),
                'firstName' => $recipient->getFirstName(),
                'email' => $recipient->getEmail(),
                'password' => $recipient->getPlainPassword(),
                'url' => $this->url,
            ]);
            list($subject, $body) = explode("\n", $content, 2);
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($mail->getSender())
                ->setTo($recipient->getEmail())
                ->setBody(trim($body))
            ;
            $this->mailer->send($message);
        }
    }

    /**
     * Send an email after update of the email.
     *
     * @param Mail $mail
     */
    public function emailUpdateMailer(Mail $mail)
    {
        if (!$mail->getSender()){
            $mail->setSender($this->mailFrom);
        }

        $recipients = $mail->getRecipients();
        foreach ($recipients as $recipient) {
            $content = $this->templating->render(':mail:email_update.txt.twig', [
                'lastName' => $recipient->getLastName(),
                'firstName' => $recipient->getFirstName(),
                'email' => $recipient->getEmail(),
                'url' => $this->url,
            ]);
            list($subject, $body) = explode("\n", $content, 2);
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($mail->getSender())
                ->setTo($recipient->getEmail())
                ->setBody(trim($body))
            ;
            $this->mailer->send($message);
        }
    }

    /**
     * The simple function to send a mail.
     *
     * @param Mail $mail
     */
    public function mailer(Mail $mail)
    {
        if (!$mail->getSender()){
            $mail->setSender($this->mailFrom);
        }

        $recipients = $mail->getRecipients();
        foreach ($recipients as $recipient) {
            $content = $this->templating->render(':mail:simple_mail.txt.twig', [
                'subject' => $mail->getSubject(),
                'body' => $mail->getBody(),
            ]);
            list($subject, $body) = explode("\n", $content, 2);
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($mail->getSender())
                ->setTo($recipient->getEmail())
                ->setBody(trim($body))
            ;
            $this->mailer->send($message);
        }
    }
}
