<?php

declare(strict_types=1);

namespace Fbsouzas\Tests\Units\Strategy\Investments;

use Fbsouzas\DesignPattern\Strategy\Investments\Bold;
use PHPUnit\Framework\TestCase;

final class BoldTest extends TestCase
{
    private const LOW_PERCENTAGE = 0.006;
    private const MIDDLE_PERCENTAGE = 0.03;
    private const HIGH_PERCENTAGE = 0.05;

    /** @dataProvider lowProfitInvestmentValues */
    public function testCalculateLowProftInvestment(float $balance, int $chance): void
    {
        $bold = new Bold($balance, $chance);

        $this->assertEquals($balance * self::LOW_PERCENTAGE, $bold->calculate());
    }

    /** @dataProvider middleProfitInvestmentValues */
    public function testCalculateMiddleProftInvestment(float $balance, int $chance): void
    {
        $bold = new Bold($balance, $chance);

        $this->assertEquals($balance * self::MIDDLE_PERCENTAGE, $bold->calculate());
    }

    /** @dataProvider highProfitInvestmentValues */
    public function testCalculateHighProftInvestment(float $balance, int $chance): void
    {
        $bold = new Bold($balance, $chance);

        $this->assertEquals($balance * self::HIGH_PERCENTAGE, $bold->calculate());
    }

    public function lowProfitInvestmentValues(): array
    {
        return [
            [5000, mt_rand(1, 50)],
            [1, mt_rand(1, 50)],
            [0.50, mt_rand(1, 50)],
            [2354465.56, mt_rand(1, 50)],
        ];
    }

    public function middleProfitInvestmentValues(): array
    {
        return [
            [5000, mt_rand(51, 80)],
            [1, mt_rand(51, 80)],
            [0.50, mt_rand(51, 80)],
            [2354465.56, mt_rand(51, 80)],
        ];
    }

    public function highProfitInvestmentValues(): array
    {
        return [
            [5000, mt_rand(81, 100)],
            [1, mt_rand(81, 100)],
            [0.50, mt_rand(81, 100)],
            [2354465.56, mt_rand(81, 100)],
        ];
    }
}
