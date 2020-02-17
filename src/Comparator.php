<?php

declare(strict_types=1);

namespace Docplanner\Reconciler;

interface Comparator
{
    public function compare($left, $right): Difference;

    public function accepts(string $type): bool;
}
