<?php

declare(strict_types=1);

namespace Fbsouzas\Tests\Units\Strategy\Investments;

use Fbsouzas\DesignPattern\Strategy\Investments\Conservative;
use PHPUnit\Framework\TestCase;

final class ConvervativeTest extends TestCase
{
    private const PERCENTAGE = 0.008;

    /** @dataProvider conservativeInvestmentValues */
    public function testCalculateInvestment(float $balance): void
    {
        $conservative = new Conservative($balance);

        $this->assertEquals($balance * self::PERCENTAGE, $conservative->calculate());
    }

    public function conservativeInvestmentValues(): array
    {
        return [
            [5000],
            [1],
            [0.02],
            [8525154.36],
        ];
    }
}
