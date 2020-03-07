<?php

namespace Fbsouzas\DesignPattern\Strategy\Taxes;

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;

interface Tax
{
    public function calculate(Budget $budget): float;
}
