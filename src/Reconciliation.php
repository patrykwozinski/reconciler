<?php

declare(strict_types=1);

namespace Docplanner\Reconciler;

final class Reconciliation
{
    /** @var Reaction */
    private $reaction;
    /** @var ComparatorFinder */
    private $comparatorFinder;

    public function __construct(Reaction $reaction, ComparatorFinder $comparatorFinder)
    {
        $this->reaction = $reaction;
        $this->comparatorFinder = $comparatorFinder;
    }

    public function compare($left, $right): Difference
    {
        $comparator = $this->comparatorFinder->for($left);
        $difference = $comparator->compare($left, $right);

        if ($difference->exists()) {
            $this->reaction->reactTo($difference);
        }

        return $difference;
    }
}
