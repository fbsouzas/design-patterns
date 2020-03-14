<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Taxes;

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;

class FederalTax implements Tax
{
    private const TAX = 0.08;


    public function calculate(Budget $budget): float
    {
        return $budget->getValue() * self::TAX;
    }
}
