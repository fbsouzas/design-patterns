<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales;

interface Discount
{
    public function calculate(Sale $sale): float;
}
