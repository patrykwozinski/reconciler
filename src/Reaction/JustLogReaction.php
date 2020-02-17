<?php

declare(strict_types=1);

namespace Docplanner\Reconciler\Reaction;

use Docplanner\Reconciler\Difference;
use Psr\Log\LoggerInterface;

final class JustLogReaction implements Reaction
{
    /** @var LoggerInterface */
    private $logger;
    /** @var string */
    private $type;

    public function __construct(LoggerInterface $logger, string $type)
    {
        $this->logger = $logger;
        $this->type = $type;
    }

    public function reactTo(Difference $diff): void
    {
        $this->logger->{$this->type}($diff->message());
    }
}
