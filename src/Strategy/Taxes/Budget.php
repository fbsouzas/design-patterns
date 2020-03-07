<?php

namespace Fbsouzas\DesignPattern\Strategy\Taxes;

class Budget
{
    private $value;


    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
