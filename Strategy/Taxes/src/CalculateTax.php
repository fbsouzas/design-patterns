<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Taxes;

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;
use Fbsouzas\DesignPattern\Strategy\Taxes\Tax;

class CalculateTax
{
    private Budget $budget;
    private Tax $tax;


    public function __construct(Budget $budget, Tax $tax)
    {
        $this->budget = $budget;
        $this->tax = $tax;
    }

    public function calculate(): float
    {
        return $this->tax->calculate($this->budget);
    }
}
