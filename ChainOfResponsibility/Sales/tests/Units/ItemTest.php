<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Tests\Units;

use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Item;
use PHPUnit\Framework\TestCase;

final class ItemTest extends TestCase
{
    /** @dataProvider getItems */
    public function testCreateANewItem(string $name, float $price, int $quantity): void
    {
        $item = new Item($name, $price, $quantity);

        $this->assertEquals($name, $item->getName());
        $this->assertEquals($price, $item->getPrice());
        $this->assertEquals($quantity, $item->getQuantity());
    }

    public function getItems(): array
    {
        return [
            ['Shoes', 150, 1],
            ['T-shirt', 20, 2],
            ['Socks', 3, 5],
            ['Pants', 50, 1],
        ];
    }
}
