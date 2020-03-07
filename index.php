<?php

require 'vendor/autoload.php';

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;
use Fbsouzas\DesignPattern\Strategy\Taxes\CalculateTax;
use Fbsouzas\DesignPattern\Strategy\Taxes\FederalTax;
use Fbsouzas\DesignPattern\Strategy\Taxes\StateTax;
use Fbsouzas\DesignPattern\Strategy\Taxes\TownTax;

$budget = new Budget(500);

$townTax = new CalculateTax($budget, new TownTax());
$stateTax = new CalculateTax($budget, new StateTax());
$federalTax = new CalculateTax($budget, new FederalTax());

echo $townTax->calculate();

echo '<br>';

echo $stateTax->calculate();

echo '<br>';

echo $federalTax->calculate();
