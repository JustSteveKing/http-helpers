<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects;

use JustSteveKing\HttpHelpers\Contracts\DataObjects\DataObjectContract;

final readonly class Header implements DataObjectContract
{
    /**
     * @param string $key
     * @param mixed $value
     */
    public function __construct(
        public string $key,
        public mixed $value,
    ) {
    }

    /**
     * @return array
     */
    public function toHeader(): array
    {
        return [
            $this->key => $this->value,
        ];
    }
}
