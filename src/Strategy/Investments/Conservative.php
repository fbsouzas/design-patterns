<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Investments;

final class Conservative implements Investment
{
    private const PERCENTAGE = 0.008;

    private float $balance;


    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function calculate(): float
    {
        return $this->balance * self::PERCENTAGE;
    }
}
