<?php

declare(strict_types=1);

namespace App\Auth\Service;

use App\Auth\Entity\User\Token;
use DateInterval;
use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

class Tokenizer
{
    private DateInterval $dateInterval;

    public function __construct(DateInterval $dateInterval)
    {
        $this->dateInterval = $dateInterval;
    }

    public function generate(DateTimeImmutable $date): Token
    {
        return new Token(Uuid::uuid4()->toString(), $date->add($this->dateInterval));
    }
}