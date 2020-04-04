<?php

namespace Fbsouzas\DesignPattern\ChainOfResponsibility\Sales;

class Sale
{
    private array $items;


    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getQuantityItems(): int
    {
        $quantity = 0;

        foreach ($this->items as $item) {
            $quantity += $item->getQuantity();
        }

        return $quantity;
    }

    public function getValue(): float
    {
        $value = 0;

        foreach ($this->items as $item) {
            $value += $item->getPrice() * $item->getQuantity();
        }

        return round($value, 2);
    }
}
