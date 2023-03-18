<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects\Http\Headers;

use JustSteveKing\HttpHelpers\Contracts\DataObjects\DataObjectContract;
use JustSteveKing\HttpHelpers\DataObjects\Header;

final readonly class ContentLength implements DataObjectContract
{
    public function __construct(
        public int $value,
    ) {}

    public function toHeader(): Header
    {
        return new Header(
            key: 'Content-Length',
            value: $this->value,
        );
    }

    public function toArray(): array
    {
        return [
            'Content-Length' => $this->value,
        ];
    }
}
