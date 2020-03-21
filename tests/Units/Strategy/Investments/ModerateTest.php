<?php

declare(strict_types=1);

namespace Fbsouzas\Tests\Units\Strategy\Investments;

use Fbsouzas\DesignPattern\Strategy\Investments\Moderate;
use PHPUnit\Framework\TestCase;

final class ModerateTest extends TestCase
{
    private const LOW_PERCENTAGE = 0.007;
    private const HIGH_PERCENTAGE = 0.025;

    /**
     * @dataProvider lowProfitInvestmentValues
     * @dataProvider highProfitInvestmentValues
     */
    public function testCalculateProfitInvestment(float $balance, float $percentage, int $chance): void
    {
        $moderate = new Moderate($balance, $chance);

        $this->assertEquals($balance * $percentage, $moderate->calculate());
    }

    public function lowProfitInvestmentValues(): array
    {
        return [
            [5000, self::LOW_PERCENTAGE, mt_rand(1, 50)],
            [1, self::LOW_PERCENTAGE, mt_rand(1, 50)],
            [0.50, self::LOW_PERCENTAGE, mt_rand(1, 50)],
            [3526523.25, self::LOW_PERCENTAGE, mt_rand(1, 50)],
        ];
    }

    public function highProfitInvestmentValues(): array
    {
        return [
            [5000, self::HIGH_PERCENTAGE, mt_rand(51, 100)],
            [1, self::HIGH_PERCENTAGE, mt_rand(51, 100)],
            [0.50, self::HIGH_PERCENTAGE, mt_rand(51, 100)],
            [3526523.25, self::HIGH_PERCENTAGE, mt_rand(51, 100)],
        ];
    }
}
