<?php

declare(strict_types=1);

namespace Docplanner\Reconciler\Reaction;

use Docplanner\Reconciler\Difference;
use Docplanner\Reconciler\Reaction;

final class DoNothingReaction implements Reaction
{
    public function reactTo(Difference $diff): void
    {
    }
}
