<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales;

final class CalculateDiscount
{
    private Sale $sale;


    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function calculate(): float
    {
        $noDiscount = new NoDiscount();
        $saleValueBiggerThan1200 = new ValueBiggerThan1200($noDiscount);
        $saleValueBiggerThan600 = new ValueBiggerThan600($saleValueBiggerThan1200);
        $saleQuantityItems = new QuantityItems($saleValueBiggerThan600);

        return $saleQuantityItems->calculate($this->sale);
    }
}