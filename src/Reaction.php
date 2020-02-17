<?php
declare(strict_types=1);

namespace Docplanner\Reconciler;


interface Reaction
{
	public function reactTo(Difference $diff): void;
}
