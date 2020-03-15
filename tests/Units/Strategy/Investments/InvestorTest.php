<?php

declare(strict_types=1);

namespace Fbsouzas\Tests\Units\Strategy\Investments;

use Fbsouzas\DesignPattern\Strategy\Investments\Account;
use Fbsouzas\DesignPattern\Strategy\Investments\Bold;
use Fbsouzas\DesignPattern\Strategy\Investments\Conservative;
use Fbsouzas\DesignPattern\Strategy\Investments\Investor;
use Fbsouzas\DesignPattern\Strategy\Investments\Moderate;
use PHPUnit\Framework\TestCase;

final class InvestorTest extends TestCase
{
    /** @dataProvider conservativeInvestmentValues */
    public function testConservativeInvestment(float $balance, float $balanceWithProfit): void
    {
        $account = new Account($balance);
        $conservative = new Conservative($account->getBalance());
        $investor = new Investor($conservative);

        $account->deposit($investor->getProfit());

        $this->assertEquals($balanceWithProfit, $account->getBalance());
    }

    /** @dataProvider moderateInvestmentValues */
    public function testModerateInvestment(float $balance, float $balanceWithProfit, int $chance): void
    {
        $account = new Account($balance);
        $moderate = new Moderate($account->getBalance(), $chance);
        $investor = new Investor($moderate);

        $account->deposit($investor->getProfit());

        $this->assertEquals($balanceWithProfit, $account->getBalance());
    }

    /** @dataProvider boldInvestmentValues */
    public function testBoldInvestment(float $balance, float $balanceWithProfit, int $chance): void
    {
        $account = new Account($balance);
        $bold = new Bold($account->getBalance(), $chance);
        $investor = new Investor($bold);

        $account->deposit($investor->getProfit());

        $this->assertEquals($balanceWithProfit, $account->getBalance());
    }

    public function conservativeInvestmentValues(): array
    {
        return [
            [5000, 5030],
            [15000, 15090],
            [1, 1.006],
            [0.50, 0.503],
            [254125.25, 255650.0015],
        ];
    }

    public function moderateInvestmentValues(): array
    {
        return [
            [5000, 5026.25, mt_rand(1, 50)],
            [15000, 15078.75, mt_rand(1, 50)],
            [1, 1.00525, mt_rand(1, 50)],
            [0.50, 0.502625, mt_rand(1, 50)],
            [254125.25, 255459.4075625, mt_rand(1, 50)],
            [5000, 5093.75, mt_rand(51, 100)],
            [15000, 15281.25, mt_rand(51, 100)],
            [1, 1.01875, mt_rand(51, 100)],
            [0.50, 0.509375, mt_rand(51, 100)],
            [254125.25, 258890.0984375, mt_rand(51, 100)],
        ];
    }

    public function boldInvestmentValues(): array
    {
        return [
            [5000, 5022.50, mt_rand(1, 50)],
            [15000, 15067.5, mt_rand(1, 50)],
            [1, 1.0045, mt_rand(1, 50)],
            [0.50, 0.50225, mt_rand(1, 50)],
            [254125.25, 255268.813625, mt_rand(1, 50)],
            [5000, 5112.5, mt_rand(51, 80)],
            [15000, 15337.5, mt_rand(51, 80)],
            [1, 1.0225, mt_rand(51, 80)],
            [0.50, 0.51125, mt_rand(51, 80)],
            [254125.25, 259843.068125, mt_rand(51, 80)],
            [5000, 5187.5, mt_rand(81, 100)],
            [15000, 15562.5, mt_rand(81, 100)],
            [1, 1.0375, mt_rand(81, 100)],
            [0.50, 0.51875, mt_rand(81, 100)],
            [254125.25, 263654.946875, mt_rand(81, 100)],
        ];
    }
}
