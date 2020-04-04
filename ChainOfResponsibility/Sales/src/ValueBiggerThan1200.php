<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales;

class ValueBiggerThan1200 implements Discount
{
    private const VALUE = 1200;
    private const DISCOUNT = 0.15;

    private Discount $next;


    public function __construct(Discount $next)
    {
        $this->next = $next;
    }

    public function calculate(Sale $sale): float
    {
        if ($sale->getValue() >= self::VALUE) {
            return $sale->getValue() * self::DISCOUNT;
        }

        return $this->next->calculate($sale);
    }
}
