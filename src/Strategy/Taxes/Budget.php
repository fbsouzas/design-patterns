<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Taxes;

use InvalidArgumentException;

class Budget
{
    private float $value;


    public function __construct(float $value)
    {
        if ($value <= 0) {
            throw new InvalidArgumentException('Budget can\'t be zero or negative value');
        }

        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
