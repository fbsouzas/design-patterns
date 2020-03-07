<?php

namespace Fbsouzas\DesignPattern\Strategy\Taxes;

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;

class FederalTax implements Tax
{
    public function calculate(Budget $budget): float
    {
        return $budget->getValue() * 0.08;
    }
}
