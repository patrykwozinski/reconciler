<?php

declare(strict_types=1);

namespace Docplanner\Reconciler\Comparator;

use Docplanner\Reconciler\Difference;

interface Comparator
{
    /**
     * @param mixed $left
     * @param mixed $right
     */
    public function compare($left, $right): Difference;

    public function accepts(string $type): bool;
}
