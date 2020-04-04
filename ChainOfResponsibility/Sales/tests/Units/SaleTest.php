<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Tests\Units;

use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Item;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Sale;
use PHPUnit\Framework\TestCase;

final class SaleTest extends TestCase
{
    /** @dataProvider getItems */
    public function testTheQuantityOfItemsAndTheValueInTheSale(array $items, int $quantityItems, float $value): void
    {
        $sale = new Sale();

        foreach ($items as $item) {
            $sale->addItem(new Item($item[0], $item[1], $item[2]));
        }

        $this->assertEquals($quantityItems, $sale->getQuantityItems());
        $this->assertEquals($value, $sale->getValue());
        $this->assertIsArray($sale->getItems());
        $this->assertCount(count($items), $sale->getItems());
    }

    public function getItems(): array
    {
        return [
            [
                [
                    ['Shoes', 150, 1],
                ],
                1,
                150
            ],
            [
                [
                    ['Shoes', 150, 1],
                    ['T-shirt', 20, 2],
                ],
                3,
                190
            ],
            [
                [
                    ['Shoes', 150.55, 1],
                    ['T-shirt', 19.99, 2],
                    ['Socks', 2.99, 5],
                    ['Candy', 0.21, 20],
                ],
                28,
                209.68
            ],
            [
                [
                    ['Pants', 47.98, 1],
                    ['T-shirt', 14.99, 3],
                    ['Socks', 2.99, 5],
                    ['Candy', 0.21, 20],
                    ['Hats', 24.99, 1],
                ],
                30,
                137.09
            ],
        ];
    }
}
