<?php

declare(strict_types=1);

namespace Fbsouzas\Tests\Units\Strategy\Investments;

use Fbsouzas\DesignPattern\Strategy\Investments\Account;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class AccountTest extends TestCase
{
    /** @dataProvider accountBalanceValues */
    public function testInitAccountWithBalance(float $balance): void
    {
        $account = new Account($balance);

        $this->assertEquals($balance, $account->getBalance());
    }

    /** @dataProvider accountNegativeBalanceValues */
    public function testInitAccountWithNegativeBalance(float $balance): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Account($balance);
    }

    /** @dataProvider depositValues */
    public function testAccountDeposit(float $balance, float $deposit, float $currentBalance): void
    {
        $account = new Account($balance);

        $account->deposit($deposit);

        $this->assertEquals($currentBalance, $account->getBalance());
    }

    /** @dataProvider depositeNegativeValues */
    public function testAccountNegativeDeposit(float $balance, float $deposit): void
    {
        $this->expectException(InvalidArgumentException::class);

        $account = new Account($balance);

        $account->deposit($deposit);
    }

    public function accountBalanceValues(): array
    {
        return [
            [5000],
            [12500.25],
            [155325],
            [1],
        ];
    }

    public function accountNegativeBalanceValues(): array
    {
        return [
            [-300],
            [-5000],
            [-1],
            [-0.001],
        ];
    }

    public function depositValues(): array
    {
        return [
            [5000, 1000, 6000],
            [12500.25, 0.50, 12500.75],
            [1, 1, 2],
            [50.25, 0.25, 50.50],
            [25, 0.01, 25.01],
            [25, 0.001, 25.001],
        ];
    }

    public function depositeNegativeValues(): array
    {
        return [
            [100, -300],
            [100, -5000],
            [100, -1],
            [100, -0.001],
        ];
    }
}
