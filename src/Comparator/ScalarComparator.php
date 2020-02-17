<?php

declare(strict_types=1);

namespace Docplanner\Reconciler\Comparator;

use Assert\Assert;
use Docplanner\Reconciler\Difference;

final class ScalarComparator implements Comparator
{
    /**
     * @param mixed $left
     * @param mixed $right
     */
    public function compare($left, $right): Difference
    {
        Assert::thatAll([$left, $right])->scalar();

        if ($left === $right) {
            return Difference::notFound();
        }

        $message = \sprintf('Difference found between scalars: "%s" and "%s"', $left, $right);

        return Difference::found($message);
    }

    public function accepts(string $type): bool
    {
        return 'string' === $type;
    }
}
