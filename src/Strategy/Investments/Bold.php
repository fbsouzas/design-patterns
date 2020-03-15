<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Investments;

final class Bold implements Investment
{
    private const LOW_PERCENTAGE = 0.006;
    private const MIDDLE_PERCENTAGE = 0.03;
    private const HIGH_PERCENTAGE = 0.05;

    private float $balace;
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

        if ($this->chance > 50 && $this->chance <= 80) {
            return self::MIDDLE_PERCENTAGE;
        }

        return self::HIGH_PERCENTAGE;
    }
}
