<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Tests\Units;

use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\CalculateDiscount;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Item;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Sale;
use PHPUnit\Framework\TestCase;

class CalculateDiscountTest extends TestCase
{
    public function testCalculateDiscountPerQuantityItems(): void
    {
        $sale = new Sale();
        $item = new Item('T-shirt', 14.99, 20);

        $sale->addItem($item);

        $calculateDiscount = new CalculateDiscount($sale);

        $this->assertEquals($sale->getValue() * 0.05, $calculateDiscount->calculate());
    }

    public function testCalculateDiscountPerValueBiggerThan600(): void
    {
        $sale = new Sale();
        $item = new Item('Cellphone', 999.99, 1);

        $sale->addItem($item);

        $calculateDiscount = new CalculateDiscount($sale);

        $this->assertEquals($sale->getValue() * 0.10, $calculateDiscount->calculate());
    }

    public function testCalculateDiscountPerValueBiggerThan1200(): void
    {
        $sale = new Sale();
        $item = new Item('Laptop', 1999.99, 1);

        $sale->addItem($item);

        $calculateDiscount = new CalculateDiscount($sale);

        $this->assertEquals($sale->getValue() * 0.15, $calculateDiscount->calculate());
    }

    public function testCalculateNoDiscount(): void
    {
        $sale = new Sale();
        $item = new Item('T-shirt', 14.99, 1);

        $sale->addItem($item);

        $calculateDiscount = new CalculateDiscount($sale);

        $this->assertEquals(0, $calculateDiscount->calculate());
    }
}
