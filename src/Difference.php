<?php

declare(strict_types=1);

namespace Docplanner\Reconciler;

final class Difference
{
    /** @var bool */
    private $exists;
    /** @var string */
    private $message;

    private function __construct(bool $exists, string $message = '')
    {
        $this->exists = $exists;
        $this->message = $message;
    }

    public static function notFound(): self
    {
        return new self(false);
    }

    public static function found(string $message): self
    {
        return new self(true, $message);
    }

    public function exists(): bool
    {
        return $this->exists;
    }

    public function message(): string
    {
        return $this->message;
    }
}
