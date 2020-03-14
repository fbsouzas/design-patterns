<?php

declare(strict_types=1);

namespace Fbsouzas\Tests\Units\Strategy\Taxes;

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;
use Fbsouzas\DesignPattern\Strategy\Taxes\FederalTax;
use PHPUnit\Framework\TestCase;

final class FederalTaxTest extends TestCase
{
    private const TAX = 0.08;


    /** @dataProvider calculateTownTaxValues */
    public function testCalculateFederalTax(float $expect, float $value): void
    {
        $budget = new Budget($value);
        $townTax = new FederalTax();

        $this->assertEquals($expect, $townTax->calculate($budget));
    }

    public function calculateTownTaxValues(): array
    {
        return [
            [500 * self::TAX, 500],
            [2500 * self::TAX, 2500],
            [8000 * self::TAX, 8000],
            [14000.25 * self::TAX, 14000.25],
        ];
    }
}
