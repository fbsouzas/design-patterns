<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Tests\Units;

use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Item;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\NoDiscount;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Sale;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\ValueBiggerThan1200;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\ValueBiggerThan600;
use PHPUnit\Framework\TestCase;

class SaleValueDiscountTest extends TestCase
{
    private const BIGGER_THAN_600_DISCOUNT = 0.10;
    private const BIGGER_THAN_1200_DISCOUNT = 0.15;

    /** @dataProvider getItemsWithValueBiggerThan600 */
    public function testDiscountToSaleValueBiggerThan600(array $items): void
    {
        $sale = new Sale();

        foreach ($items as $item) {
            $sale->addItem(new Item($item[0], $item[1], $item[2]));
        }

        $noDiscount = new NoDiscount();
        $valueDiscount = new ValueBiggerThan600($noDiscount);

        $discount = $valueDiscount->calculate($sale);

        $this->assertEquals($sale->getValue() * self::BIGGER_THAN_600_DISCOUNT, $discount);
    }

    /** @dataProvider getItemsWithValueBiggerThan1200 */
    public function testDiscountToSaleValueBiggerThan1200(array $items): void
    {
        $sale = new Sale();

        foreach ($items as $item) {
            $sale->addItem(new Item($item[0], $item[1], $item[2]));
        }

        $noDiscount = new NoDiscount();
        $valueDiscount = new ValueBiggerThan1200($noDiscount);

        $discount = $valueDiscount->calculate($sale);

        $this->assertEquals($sale->getValue() * self::BIGGER_THAN_1200_DISCOUNT, $discount);
    }

    public function getItemsWithValueBiggerThan600(): array
    {
        return [
            [
                [
                    ['TV', 600, 1],
                ],
            ],
            [
                [
                    ['Cellphone', 499.99, 2],
                ],
            ],
            [
                [
                    ['Cellphone', 499.99, 1],
                    ['Keyboard', 99.99, 2],
                ],
            ],
            [
                [
                    ['CD Game', 79.99, 3],
                    ['Joystick', 89.99, 4],
                    ['Headphone', 59.99, 1],
                ],
            ],
            [
                [
                    ['T-shirt', 14.99, 5],
                    ['Pants', 69.99, 1],
                    ['Shoes', 149.99, 1],
                    ['Jacket', 249.99, 1],
                    ['Blouse', 79.99, 2],
                ],
            ],
        ];
    }

    public function getItemsWithValueBiggerThan1200(): array
    {
        return [
            [
                [
                    ['Tesla Model Y', 70000, 1],
                ],
            ],
            [
                [
                    ['Drone', 1499.99, 1],
                ],
            ],
            [
                [
                    ['Cellphone', 999.99, 1],
                    ['Laptop', 999.99, 1],
                ],
            ],
            [
                [
                    ['Cellphone A', 899.99, 1],
                    ['Cellphone B', 999.99, 1],
                    ['Cellphone C', 799.99, 1],
                ],
            ]
        ];
    }
}
