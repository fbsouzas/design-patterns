<?php

use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\CalculateDiscount;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Item;
use Fbsouzas\DesignPattern\ChainOfResponsibility\Sales\Sale;

require 'vendor/autoload.php';

$sale = new Sale();

$sale->addItem(new Item('T-shirt', 14.99, 20));

$discount = new CalculateDiscount($sale);

echo "The discount for this sale is: " . $discount->calculate();
