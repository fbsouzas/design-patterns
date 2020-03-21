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

    /**
     * @dataProvider lowProfitInvestmentValues
     * @dataProvider middleProfitInvestmentValues
     * @dataProvider highProfitInvestmentValues
     */
    public function testCalculateProfitInvestment(float $balance, float $percentage, int $chance): void
    {
        $bold = new Bold($balance, $chance);

        $this->assertEquals($balance * $percentage, $bold->calculate());
    }

    public function lowProfitInvestmentValues(): array
    {
        return [
            [5000, self::LOW_PERCENTAGE, mt_rand(1, 50)],
            [1, self::LOW_PERCENTAGE, mt_rand(1, 50)],
            [0.50, self::LOW_PERCENTAGE, mt_rand(1, 50)],
            [2354465.56, self::LOW_PERCENTAGE, mt_rand(1, 50)],
        ];
    }

    public function middleProfitInvestmentValues(): array
    {
        return [
            [5000, self::MIDDLE_PERCENTAGE, mt_rand(51, 80)],
            [1, self::MIDDLE_PERCENTAGE, mt_rand(51, 80)],
            [0.50, self::MIDDLE_PERCENTAGE, mt_rand(51, 80)],
            [2354465.56, self::MIDDLE_PERCENTAGE, mt_rand(51, 80)],
        ];
    }

    public function highProfitInvestmentValues(): array
    {
        return [
            [5000, self::HIGH_PERCENTAGE, mt_rand(81, 100)],
            [1, self::HIGH_PERCENTAGE, mt_rand(81, 100)],
            [0.50, self::HIGH_PERCENTAGE, mt_rand(81, 100)],
            [2354465.56, self::HIGH_PERCENTAGE, mt_rand(81, 100)],
        ];
    }
}
