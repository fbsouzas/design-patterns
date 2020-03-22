<?php

declare(strict_types=1);

namespace Fbsouzas\Tests\Units\Strategy\Taxes;

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;
use Fbsouzas\DesignPattern\Strategy\Taxes\CalculateTax;
use Fbsouzas\DesignPattern\Strategy\Taxes\FederalTax;
use Fbsouzas\DesignPattern\Strategy\Taxes\StateTax;
use Fbsouzas\DesignPattern\Strategy\Taxes\TownTax;
use PHPUnit\Framework\TestCase;

final class CalculateTaxTest extends TestCase
{
    private const TOWN_TAX = 0.02;
    private const STATE_TAX = 0.05;
    private const FEDERAL_TAX = 0.08;


    /** @dataProvider calculateTaxValues */
    public function testCalculateTax(
        float $value,
        float $townTaxExpected,
        float $stateTaxExpected,
        float $federalTaxExpected
    ) {
        $budget = new Budget($value);
        $townTax = new CalculateTax($budget, new TownTax($budget));
        $stateTax = new CalculateTax($budget, new StateTax($budget));
        $federalTax = new CalculateTax($budget, new FederalTax($budget));

        $this->assertEquals($townTaxExpected, $townTax->calculate());
        $this->assertEquals($stateTaxExpected, $stateTax->calculate());
        $this->assertEquals($federalTaxExpected, $federalTax->calculate());
    }

    public function calculateTaxValues(): array
    {
        return [
            [500, 500 * self::TOWN_TAX, 500 * self::STATE_TAX, 500 * self::FEDERAL_TAX],
            [2500, 2500 * self::TOWN_TAX, 2500 * self::STATE_TAX, 2500 * self::FEDERAL_TAX],
            [18000, 18000 * self::TOWN_TAX, 18000 * self::STATE_TAX, 18000 * self::FEDERAL_TAX],
            [3215486.35, 3215486.35 * self::TOWN_TAX, 3215486.35 * self::STATE_TAX, 3215486.35 * self::FEDERAL_TAX],
        ];
    }
}
