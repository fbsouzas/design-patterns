<?php

declare(strict_types=1);

namespace Fbsouzas\DesignPattern\Strategy\Investments;

interface Investment
{
    public function calculate(): float;
}
