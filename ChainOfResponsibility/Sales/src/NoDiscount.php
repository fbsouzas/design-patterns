<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales;

final class NoDiscount implements Discount
{
    private const DISCOUNT = 0;

    public function calculate(Sale $sale): float
    {
        return $sale->getValue() * self::DISCOUNT;
    }
}
