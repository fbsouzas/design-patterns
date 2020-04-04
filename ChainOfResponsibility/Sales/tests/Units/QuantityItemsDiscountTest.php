<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Tests\Units;

use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Item;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\NoDiscount;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\QuantityItems;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Sale;
use PHPUnit\Framework\TestCase;

class QuantityItemsTest extends TestCase
{
    private const DISCOUNT = 0.05;

    /** @dataProvider getQuantityItemsBiggerThan20 */
    public function testDiscountQuantityBiggerThan20Itens(array $items): void
    {
        $sale = new Sale();

        foreach ($items as $item) {
            $sale->addItem(new Item($item[0], $item[1], $item[2]));
        }

        $noDiscount = new NoDiscount();
        $quantityItemsDiscount = new QuantityItems($noDiscount);

        $this->assertEquals($sale->getValue() * self::DISCOUNT, $quantityItemsDiscount->calculate($sale));
    }

    public function getQuantityItemsBiggerThan20(): array
    {
        return [
            [
                [
                    ['Socks', 2, 20],
                ],
            ],
            [
                [
                    ['Socks', 2, 21],
                ],
            ],
            [
                [
                    ['Socks', 2, 150],
                ],
            ],
            [
                [
                    ['Socks', 2, 10],
                    ['T-shirt', 6.99, 10],
                ],
            ],
        ];
    }
}
