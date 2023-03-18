<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects\Http\Headers;

use JustSteveKing\HttpHelpers\Contracts\DataObjects\DataObjectContract;
use JustSteveKing\HttpHelpers\DataObjects\Header;
use JustSteveKing\HttpHelpers\Enums\ContentType;

final readonly class Accept implements DataObjectContract
{
    public function __construct(
        public ContentType $value,
    ) {
    }

    public function asHeader(): Header
    {
        return new Header(
            key: 'Accept',
            value: $this->value,
        );
    }

    public function toArray(): array
    {
        return [
            'Accept' => $this->value->value,
        ];
    }
}
