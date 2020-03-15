<?php

require 'vendor/autoload.php';

use Fbsouzas\DesignPattern\Strategy\Investments\Account;
use Fbsouzas\DesignPattern\Strategy\Investments\Bold;
use Fbsouzas\DesignPattern\Strategy\Investments\Conservative;
use Fbsouzas\DesignPattern\Strategy\Investments\Investor;
use Fbsouzas\DesignPattern\Strategy\Investments\Moderate;
use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;
use Fbsouzas\DesignPattern\Strategy\Taxes\CalculateTax;
use Fbsouzas\DesignPattern\Strategy\Taxes\FederalTax;
use Fbsouzas\DesignPattern\Strategy\Taxes\StateTax;
use Fbsouzas\DesignPattern\Strategy\Taxes\TownTax;

$budget = new Budget(500);

$townTax = new CalculateTax($budget, new TownTax());
$stateTax = new CalculateTax($budget, new StateTax());
$federalTax = new CalculateTax($budget, new FederalTax());

echo 'Taxes';

echo 'Town tax: ' . $townTax->calculate();
echo '<br>';
echo 'State tax: ' . $stateTax->calculate();
echo '<br>';
echo 'Federal tax: ' . $federalTax->calculate();
echo '<br>';

echo '=================================================================';
echo '<br>';

echo 'Investments';
echo '<br>';

$account = new Account(500);
$conservative = new Bold($account->getBalance(), mt_rand(1, 100));
$investor = new Investor($conservative);

$account->deposit($investor->getProfit());

echo 'Lucro do investimento: ' . $account->getBalance();
