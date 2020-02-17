<?php

declare(strict_types=1);

namespace Docplanner\Reconciler\Tests\Unit;

use Docplanner\Reconciler\Comparator\ComparatorNotFound;
use Docplanner\Reconciler\ComparatorFinder;
use Docplanner\Reconciler\Tests\Double\StubComparator;
use PHPUnit\Framework\TestCase;

final class ComparatorFinderTest extends TestCase
{
    /** @var ComparatorFinder */
    private $finder;
    /** @var StubComparator */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new StubComparator();
        $this->finder = new ComparatorFinder($this->comparator);
    }

    public function testFoundWhenOneIsAccepting(): void
    {
        // When
        $this->comparator->shouldAccept();
        $this->finder->for('Hi!');

        // Then
        $this->addToAssertionCount(1);
    }

    public function testNotFoundWhenNoOneIsAccepting(): void
    {
        // Expect
        $this->expectException(ComparatorNotFound::class);

        // When
        $this->finder->for('Hi!');
    }
}
