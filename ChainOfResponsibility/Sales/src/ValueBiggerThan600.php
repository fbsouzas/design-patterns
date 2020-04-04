<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales;

class ValueBiggerThan600 implements Discount
{
    private const FROM_VALUE = 600;
    private const TO_VALUE = 1200;
    private const DISCOUNT = 0.10;


    private Discount $next;


    public function __construct(Discount $next)
    {
        $this->next = $next;
    }

    public function calculate(Sale $sale): float
    {
        if ($sale->getValue() >= self::FROM_VALUE && $sale->getValue() < self::TO_VALUE) {
            return $sale->getValue() * self::DISCOUNT;
        }

        return $this->next->calculate($sale);
    }
}
