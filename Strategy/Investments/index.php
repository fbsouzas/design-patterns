<?php

require 'vendor/autoload.php';

use Fbsouzas\DesignPattern\Strategy\Investments\Account;
use Fbsouzas\DesignPattern\Strategy\Investments\Bold;
use Fbsouzas\DesignPattern\Strategy\Investments\Conservative;
use Fbsouzas\DesignPattern\Strategy\Investments\Investor;
use Fbsouzas\DesignPattern\Strategy\Investments\Moderate;

echo 'Investments';
echo '<br>';

$account = new Account(500);
$conservative = new Bold($account->getBalance(), mt_rand(1, 100));
$investor = new Investor($conservative);

$account->deposit($investor->getProfit());

echo 'Lucro do investimento: ' . $account->getBalance();
