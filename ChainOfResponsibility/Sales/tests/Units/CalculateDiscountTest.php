<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Tests\Units;

use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\CalculateDiscount;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Item;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Sale;
use PHPUnit\Framework\TestCase;

class CalculateDiscountTest extends TestCase
{
    private Sale $sale;


    public function setUp(): void
    {
        $this->sale = new Sale();
    }

    /** @dataProvider discountPerQuantityItems */
    public function testCalculateDiscountPerQuantityItems(array $items): void
    {
        $calculateDiscount = $this->getCalculateDiscount($items);

        $this->assertEquals($this->sale->getValue() * 0.05, $calculateDiscount->calculate());
    }

    /** @dataProvider discountPerValueBiggerThan600 */
    public function testCalculateDiscountPerValueBiggerThan600(array $items): void
    {
        $calculateDiscount = $this->getCalculateDiscount($items);

        $this->assertEquals($this->sale->getValue() * 0.10, $calculateDiscount->calculate());
    }

    /** @dataProvider discountPerValueBiggerThan1200 */
    public function testCalculateDiscountPerValueBiggerThan1200(array $items): void
    {
        $calculateDiscount = $this->getCalculateDiscount($items);

        $this->assertEquals($this->sale->getValue() * 0.15, $calculateDiscount->calculate());
    }

    /** @dataProvider noDiscountItems */
    public function testCalculateNoDiscount(array $items): void
    {
        $calculateDiscount = $this->getCalculateDiscount($items);

        $this->assertEquals(0, $calculateDiscount->calculate());
    }

    private function getCalculateDiscount(array $items)
    {
        foreach ($items as $item) {
            $this->sale->addItem(new Item($item['name'], $item['price'], $item['quantity']));
        }

        return new CalculateDiscount($this->sale);
    }

    public function discountPerQuantityItems(): array
    {
        return [
            [
                [
                    [
                        'name' => 'T-Shirt',
                        'price' => 14.99,
                        'quantity' => 15,
                    ],
                    [
                        'name' => 'Socks',
                        'price' => 4.99,
                        'quantity' => 5,
                    ],
                ],
            ],
            [
                [
                    [
                        'name' => 'T-Shirt',
                        'price' => 14.99,
                        'quantity' => 10,
                    ],
                    [
                        'name' => 'Socks',
                        'price' => 4.99,
                        'quantity' => 10,
                    ],
                    [
                        'name' => 'Pants',
                        'price' => 29.99,
                        'quantity' => 1,
                    ],
                ],
            ],
            [
                [
                    [
                        'name' => 'T-Shirt 1',
                        'price' => 14.99,
                        'quantity' => 25,
                    ],
                ],
            ],
        ];
    }

    public function discountPerValueBiggerThan600(): array
    {
        return [
            [
                [
                    [
                        'name' => 'Keyboard',
                        'price' => 149.99,
                        'quantity' => 1,
                    ],
                    [
                        'name' => 'Screen',
                        'price' => 459.99,
                        'quantity' => 1,
                    ],
                ],
            ],
            [
                [
                    [
                        'name' => 'Smartphone',
                        'price' => 499.99,
                        'quantity' => 1,
                    ],
                    [
                        'name' => 'Headphone',
                        'price' => 199.99,
                        'quantity' => 1,
                    ],
                    [
                        'name' => 'Backpack',
                        'price' => 59.99,
                        'quantity' => 1,
                    ],
                ],
            ],
            [
                [
                    [
                        'name' => 'Spartphone',
                        'price' => 999.99,
                        'quantity' => 1,
                    ],
                ],
            ],
        ];
    }

    public function discountPerValueBiggerThan1200(): array
    {
        return [
            [
                [
                    [
                        'name' => 'Keyboard',
                        'price' => 149.99,
                        'quantity' => 3,
                    ],
                    [
                        'name' => 'Screen',
                        'price' => 459.99,
                        'quantity' => 3,
                    ],
                ],
            ],
            [
                [
                    [
                        'name' => 'Smartphone',
                        'price' => 499.99,
                        'quantity' => 2,
                    ],
                    [
                        'name' => 'Headphone',
                        'price' => 199.99,
                        'quantity' => 2,
                    ],
                    [
                        'name' => 'Backpack',
                        'price' => 59.99,
                        'quantity' => 1,
                    ],
                ],
            ],
            [
                [
                    [
                        'name' => 'Spartphone',
                        'price' => 1219.99,
                        'quantity' => 1,
                    ],
                ],
            ],
        ];
    }

    public function noDiscountItems(): array
    {
        return [
            [
                [
                    [
                        'name' => 'T-Shirt',
                        'price' => 14.99,
                        'quantity' => 1,
                    ],
                    [
                        'name' => 'Socks',
                        'price' => 4.99,
                        'quantity' => 2,
                    ],
                ],
            ],
            [
                [
                    [
                        'name' => 'T-Shirt 1',
                        'price' => 14.99,
                        'quantity' => 1,
                    ],
                ],
            ],
        ];
    }
}
