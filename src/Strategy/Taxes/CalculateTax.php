<?php

namespace Fbsouzas\DesignPattern\Strategy\Taxes;

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;
use Fbsouzas\DesignPattern\Strategy\Taxes\Tax;

class CalculateTax
{
    private $budget;
    private $tax;


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
