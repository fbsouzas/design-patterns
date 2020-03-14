<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Taxes;

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;

class TownTax implements Tax
{
    private const TAX = 0.02;


    public function calculate(Budget $budget): float
    {
        return $budget->getValue() * self::TAX;
    }
}
