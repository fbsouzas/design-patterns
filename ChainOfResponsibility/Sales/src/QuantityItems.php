<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales;

class QuantityItems implements Discount
{
    private const QUANTITY_ITEMS = 20;
    private const DISCOUNT = 0.05;

    private Discount $next;


    public function __construct(Discount $next)
    {
        $this->next = $next;
    }

    public function calculate(Sale $sale): float
    {
        if ($sale->getQuantityItems() >= self::QUANTITY_ITEMS) {
            return $sale->getValue() * self::DISCOUNT;
        }

        return $this->next->calculate($sale);
    }
}
