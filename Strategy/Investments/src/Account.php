<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Investments;

use InvalidArgumentException;

class Account
{
    private float $balance;


    public function __construct(float $balance)
    {
        $this->isValidThisValue($balance);

        $this->balance = $balance;
    }

    public function deposit(float $value): void
    {
        $this->isValidThisValue($value);

        $this->balance += $value;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    private function isValidThisValue(float $value): ?bool
    {
        if ($value > 0) {
            return true;
        }

        throw new InvalidArgumentException('The deposit can\'t be a negative value');
    }
}
