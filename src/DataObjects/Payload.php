<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects;

use JustSteveKing\HttpHelpers\Contracts\DataObjects\DataObjectContract;

final readonly class Payload implements DataObjectContract
{
    public function __construct(
        public array $data,
    ) {}

    public function toArray(): array
    {
        return $this->data;
    }
}
