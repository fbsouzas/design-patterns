<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Tests\Units;

use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Item;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\NoDiscount;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Sale;
use PHPUnit\Framework\TestCase;

class NoDiscountTest extends TestCase
{
    /** @dataProvider getItems */
    public function testSaleWithoutDiscount(array $items): void
    {
        $sale = new Sale();

        foreach ($items as $item) {
            $sale->addItem(new Item($item[0], $item[1], $item[2]));
        }

        $noDiscount = new NoDiscount();

        $discount = $noDiscount->calculate($sale);

        $this->assertEquals(0, $discount);
    }

    public function getItems(): array
    {
        return [
            [
                [
                    ['Socks', 2, 1],
                ],
                [
                    ['Socks', 2, 1],
                    ['Hats', 9.99, 1],
                    ['Glasses', 19.99, 2],
                ],
                [
                    ['TV', 700, 1],
                ],
                [
                    ['Drone', 1219.99, 1],
                ],
                [
                    ['Socks', 2, 25],
                ],
            ],
        ];
    }
}
