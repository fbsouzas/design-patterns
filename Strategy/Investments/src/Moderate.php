<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Investments;

final class Moderate implements Investment
{
    private const LOW_PERCENTAGE = 0.007;
    private const HIGH_PERCENTAGE = 0.025;

    private float $balance;
    private int $chance;


    public function __construct(float $balance, int $chance)
    {
        $this->balance = $balance;
        $this->chance = $chance;
    }

    public function calculate(): float
    {
        return $this->balance * $this->getPercentageByChance();
    }

    private function getPercentageByChance(): float
    {
        if ($this->chance <= 50) {
            return self::LOW_PERCENTAGE;
        }

        return self::HIGH_PERCENTAGE;
    }
}
