<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects;

use JustSteveKing\HttpHelpers\Contracts\DataObjects\DataObjectContract;
use JustSteveKing\HttpHelpers\Enums\Scheme;
use JustSteveKing\ParameterBag\ParameterBag;

final class URL implements DataObjectContract
{
    public null|ParameterBag $query = null;

    public function __construct(
        public Scheme $scheme,
        public string $host,
        public null|string $path = null,
    ) {}

    public static function fromString(string $url): URL
    {
        /**
         * @var array{scheme: string, host: string, path: null|string, query: null|string} $parts
         */
        $parts = \Safe\parse_url(
            url: $url,
        );

        $uri = new URL(
            scheme: Scheme::from(
                value: $parts['scheme'],
            ),
            host: $parts['host'],
        );

        if ($parts['path']) {
            $uri->path = $parts['path'];
        }

        $uri->query = isset($parts['query']) ? ParameterBag::fromString(
            attributes: $parts['query']
        ) : null;

        return $uri;
    }

    public function toString(): string
    {
        $scheme = $this->scheme->value;

        $url = "$scheme://$this->host";

        if ($this->path) {
            $url .= "$this->path";
        }

        if (! empty($this->query?->all())) {
            $collection = [];

            foreach ($this->query->all() as $key => $value) {
                $collection[] = "$key=$value";
            }

            $queryParamString = implode('&', $collection);

            $url .= "?$queryParamString";
        }

        return $url;
    }
}
