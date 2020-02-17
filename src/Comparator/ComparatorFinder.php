<?php

declare(strict_types=1);

namespace Docplanner\Reconciler\Comparator;

final class ComparatorFinder
{
    /** @var Comparator[] */
    private $comparators;

    public function __construct(Comparator ...$comparators)
    {
        $this->comparators = $comparators;
    }

    /**
     * @param mixed $element
     *
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
