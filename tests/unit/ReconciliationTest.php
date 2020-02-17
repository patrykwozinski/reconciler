<?php
declare(strict_types=1);

namespace Docplanner\Reconciler\Tests\Unit;


use Docplanner\Reconciler\ComparatorFinder;
use Docplanner\Reconciler\Reconciliation;
use Docplanner\Reconciler\Tests\Double\SpyReaction;
use Docplanner\Reconciler\Tests\Double\StubComparator;
use PHPUnit\Framework\TestCase;

final class ReconciliationTest extends TestCase
{
	/** @var SpyReaction */
	private $reaction;
	/** @var StubComparator */
	private $comparator;
	/** @var ComparatorFinder */
	private $comparatorFinder;
	/** @var Reconciliation */
	private $reconciliation;

	protected function setUp(): void
	{
		$this->reaction         = new SpyReaction;
		$this->comparator       = new StubComparator;
		$this->comparatorFinder = new ComparatorFinder($this->comparator);
		$this->reconciliation   = new Reconciliation($this->reaction, $this->comparatorFinder);
	}

	public function testReactWhenDifferent(): void
	{
		// When
		$this->comparator->shouldAccept();
		$this->comparator->whenFoundDifference();

		$difference = $this->reconciliation->compare('Hi', 'Hello');

		// Then
		self::assertTrue($this->reaction->wasReacted());
		self::assertTrue($difference->exists());
	}

	public function testDoNothingWhenTheSame(): void
	{
		// When
		$this->comparator->shouldAccept();
		$this->comparator->whenNotFoundDifference();

		$difference = $this->reconciliation->compare('Hi', 'Hi');

		// Then
		self::assertFalse($this->reaction->wasReacted());
		self::assertFalse($difference->exists());
	}
}
