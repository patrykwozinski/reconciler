<?php

declare(strict_types=1);

namespace Docplanner\Reconciler\Tests\Double;

use Docplanner\Reconciler\Difference;
use Docplanner\Reconciler\Reaction\Reaction;

final class SpyReaction implements Reaction
{
    /** @var bool */
    private $reacted = false;

    public function reactTo(Difference $diff): void
    {
        $this->reacted = true;
    }

    public function wasReacted(): bool
    {
        return $this->reacted;
    }
}
