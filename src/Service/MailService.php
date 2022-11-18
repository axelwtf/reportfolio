<?php

namespace App\Service;

use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;


class MailService
{
    public function __construct(
        private EntityManagerInterface $manager,
        private MailerInterface $mailer
    ) {}

    public function sendEmail(
        string $from,
        string $subject,
        string $html,
        string $to = 'wolfs.axelw@gmail.com'
    ): void
    {
        $email = (new Email())
            ->from($from)
            ->to($to)
            ->subject($subject)
            ->html($html);

        $this->mailer->send($email);
    }


}
