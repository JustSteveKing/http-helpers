<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects\Http\Headers;

use JustSteveKing\HttpHelpers\Contracts\DataObjects\DataObjectContract;
use JustSteveKing\HttpHelpers\DataObjects\Header;
use JustSteveKing\HttpHelpers\Enums\ContentType as ContentTypeEnum;

final class ContentType implements DataObjectContract
{
    public function __construct(
        public readonly ContentTypeEnum $value,
    ) {
    }

    public function toHeader(): Header
    {
        return new Header(
            key: 'Content-Type',
            value: $this->value,
        );
    }

    public function toArray(): array
    {
        return [
            'Content-Type' => $this->value->value,
        ];
    }
}
