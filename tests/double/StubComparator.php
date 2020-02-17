<?php
declare(strict_types=1);

namespace Docplanner\Reconciler\Tests\Double;


use Docplanner\Reconciler\Comparator;
use Docplanner\Reconciler\Difference;

final class StubComparator implements Comparator
{
	/** @var Difference|null */
	private $difference;

	/** @var bool */
	private $accepts = false;

	public function compare($left, $right): Difference
	{
		return $this->difference;
	}

	public function accepts(string $type): bool
	{
		return $this->accepts;
	}

	public function shouldAccept(): void
	{
		$this->accepts = true;
	}

	public function whenFoundDifference(): void
	{
		$this->difference = Difference::found('Found');
	}

	public function whenNotFoundDifference(): void
	{
		$this->difference = Difference::notFound();
	}
}
