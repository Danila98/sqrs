<?php

declare(strict_types=1);

namespace App\Auth\Entity\User;

use ArrayObject;
use DateTimeImmutable;

class User
{
    private Id                $id;
    private DateTimeImmutable $date;
    private Email             $email;
    private Status            $status;
    private ArrayObject       $networks;


    private function __construct(Id $id, DateTimeImmutable $date, Email $email, Status $status)
    {
        $this->id       = $id;
        $this->date     = $date;
        $this->email    = $email;
        $this->status   = $status;
        $this->networks = new ArrayObject();
    }

    public static function requestJoinByEmail(
        Id $id,
        DateTimeImmutable $date,
        Email $email,
        string $passwordHash,
        Token $token
    ): self {
        $user                   = new self($id, $date, $email, Status::wait());
        $user->passwordHash     = $passwordHash;
        $user->joinConfirmToken = $token;

        return $user;
    }

    public static function joinByNetwork(
        Id $id,
        DateTimeImmutable $date,
        Email $email,
        NetworkIdentity $identity
    ): self {
        $user = new self($id, $date, $email, Status::active());
        $user->networks->append($identity);

        return $user;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    public function getJoinConfirmToken(): ?Token
    {
        return $this->joinConfirmToken;
    }

    public function getNetworks(): array
    {
        /** @var NetworkIdentity[] */
        return $this->networks->getArrayCopy();
    }
}