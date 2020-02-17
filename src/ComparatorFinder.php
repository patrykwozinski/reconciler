<?php

declare(strict_types=1);

namespace Docplanner\Reconciler;

use Docplanner\Reconciler\Comparator\ComparatorNotFound;

final class ComparatorFinder
{
    /** @var Comparator[] */
    private $comparators;

    public function __construct(Comparator ...$comparators)
    {
        $this->comparators = $comparators;
    }

    /**
     * @throws ComparatorNotFound
     */
    public function for($element): Comparator
    {
        $elementType = \gettype($element);

        foreach ($this->comparators as $comparator) {
            if ($comparator->accepts($elementType)) {
                return $comparator;
            }
        }

        throw ComparatorNotFound::withGivenType($elementType);
    }
}
