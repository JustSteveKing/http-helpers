<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects\Http;

use JustSteveKing\HttpHelpers\Contracts\DataObjects\DataObjectContract;
use JustSteveKing\HttpHelpers\DataObjects\Header;
use JustSteveKing\HttpHelpers\Enums\ContentType;

final readonly class Accept implements DataObjectContract
{
    public function __construct(
        private ContentType $type,
    ) {}

    public function asHeader(): Header
    {
        return new Header(
            key: 'Accept',
            value: $this->type,
        );
    }

    public function toArray(): array
    {
        return [
            'Accept' => $this->type->value,
        ];
    }
}
