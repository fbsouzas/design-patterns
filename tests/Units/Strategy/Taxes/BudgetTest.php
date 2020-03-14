<?php

declare(strict_types=1);

namespace Fbsouzas\Tests\Units\Strategy\Taxes;

use Fbsouzas\DesignPattern\Strategy\Taxes\Budget;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;
use TypeError;

final class BudgetTest extends TestCase
{
    /** @dataProvider positiveBudgetValeus */
    public function testPositiveBudgetValue(float $value): void
    {
        $budget = new Budget($value);

        $this->assertEquals($value, $budget->getValue());
    }

    /** @dataProvider negativeBudgetValues */
    public function testNegativeBudgetValue(float $value): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Budget($value);
    }

    /** @dataProvider nonFloatTypeBudgetValues */
    public function testNonFloatTypeToBudgetValue($nonFloatTypeValue): void
    {
        $this->expectException(TypeError::class);

        new Budget($nonFloatTypeValue);
    }

    public function positiveBudgetValeus(): array
    {
        return [
            [300],
            [900],
            [1250.25],
            [101250.72],
        ];
    }

    public function negativeBudgetValues(): array
    {
        return [
            [-300],
            [-1500],
            [-52352.65],
            [-1000000],
        ];
    }

    public function nonFloatTypeBudgetValues(): array
    {
        return [
            ['S'],
            ['*'],
            [new stdClass()],
            [[]],
        ];
    }
}
