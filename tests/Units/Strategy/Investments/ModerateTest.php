<?php

declare(strict_types=1);

namespace Fbsouzas\Tests\Units\Strategy\Investments;

use Fbsouzas\DesignPattern\Strategy\Investments\Moderate;
use PHPUnit\Framework\TestCase;

final class ModerateTest extends TestCase
{
    private const LOW_PERCENTAGE = 0.007;
    private const HIGH_PERCENTAGE = 0.025;

    /** @dataProvider lowProfitInvestmentValues */
    public function testCalculateLowProfitInvestment(float $balance, int $chance): void
    {
        $moderate = new Moderate($balance, $chance);

        $this->assertEquals($balance * self::LOW_PERCENTAGE, $moderate->calculate());
    }

    /** @dataProvider highProfitInvestmentValues */
    public function testCalculateHighProftInvestment(float $balance, int $chance): void
    {
        $moderate = new Moderate($balance, $chance);

        $this->assertEquals($balance * self::HIGH_PERCENTAGE, $moderate->calculate());
    }

    public function lowProfitInvestmentValues(): array
    {
        return [
            [5000, mt_rand(1, 50)],
            [1, mt_rand(1, 50)],
            [0.50, mt_rand(1, 50)],
            [3526523.25, mt_rand(1, 50)],
        ];
    }

    public function highProfitInvestmentValues(): array
    {
        return [
            [5000, mt_rand(51, 100)],
            [1, mt_rand(51, 100)],
            [0.50, mt_rand(51, 100)],
            [3526523.25, mt_rand(51, 100)],
        ];
    }
}
