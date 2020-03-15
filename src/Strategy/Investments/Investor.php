<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Investments;

class Investor
{
    private const PROFIT_PERCENTAGE = 0.75;

    private Investment $investment;

    public function __construct(Investment $investment)
    {
        $this->investment = $investment;
    }

    public function getProfit(): float
    {
        return $this->discountTax($this->investment->calculate());
    }

    private function discountTax(float $profit): float
    {
        return $profit * self::PROFIT_PERCENTAGE;
    }
}
