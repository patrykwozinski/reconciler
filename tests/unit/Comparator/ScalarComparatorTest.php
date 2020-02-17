<?php
declare(strict_types=1);

namespace Docplanner\Reconciler\Tests\Unit\Comparator;


use Assert\InvalidArgumentException;
use Docplanner\Reconciler\Comparator\ScalarComparator;
use PHPUnit\Framework\TestCase;
use stdClass;

final class ScalarComparatorTest extends TestCase
{
	private const HELLO_DARKNESS = 'Hello Darkness';
	private const BYE_DARKNESS   = 'Bye Darkness';

	/** @var ScalarComparator */
	private $comparator;

	protected function setUp(): void
	{
		$this->comparator = new ScalarComparator;
	}

	/**
	 * @param mixed $left
	 * @param mixed $right
	 *
	 * @dataProvider otherThanScalars
	 */
	public function testCannotCompareOtherThanScalars($left, $right): void
	{
		// Expect
		$this->expectException(InvalidArgumentException::class);

		// When
		$this->comparator->compare($left, $right);
	}

	public function testTheSameScalars(): void
	{
		// When
		$difference = $this->comparator->compare(self::HELLO_DARKNESS, self::HELLO_DARKNESS);

		// Then
		self::assertEmpty($difference->message());
		self::assertFalse($difference->exists());
	}

	public function testDifferentScalars(): void
	{
		// When
		$difference = $this->comparator->compare(self::HELLO_DARKNESS, self::BYE_DARKNESS);

		// Then
		$expectedDifferenceMessage = sprintf('Difference found between scalars: "%s" and "%s"', self::HELLO_DARKNESS, self::BYE_DARKNESS);

		self::assertEquals($expectedDifferenceMessage, $difference->message());
		self::assertTrue($difference->exists());
	}

	public function otherThanScalars(): array
	{
		return [
			[
				['some array'],
				['other array'],
			],
			[
				new stdClass,
				new stdClass,
			],
		];
	}
}
