<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects\Http\Headers;

use JustSteveKing\HttpHelpers\Contracts\DataObjects\DataObjectContract;
use JustSteveKing\HttpHelpers\DataObjects\Header;

final readonly class Host implements DataObjectContract
{
    public function __construct(
        public string $value,
    ) {
    }

    public function toHeader(): Header
    {
        return new Header(
            key: 'Host',
            value: $this->value,
        );
    }

    public function toArray(): array
    {
        return [
            'Host' => $this->value,
        ];
    }
}
