<?php
declare(strict_types=1);

namespace Docplanner\Reconciler\Comparator;


use RuntimeException;

final class ComparatorNotFound extends RuntimeException
{
	public static function withGivenType(string $type): self
	{
		$message = sprintf('Comparator not found when given type: %s', $type);

		return new self($message);
	}
}
