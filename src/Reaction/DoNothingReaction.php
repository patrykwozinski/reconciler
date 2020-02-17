<?php

declare(strict_types=1);

namespace Docplanner\Reconciler\Reaction;

use Docplanner\Reconciler\Difference;

final class DoNothingReaction implements Reaction
{
    public function reactTo(Difference $diff): void
    {
    }
}
