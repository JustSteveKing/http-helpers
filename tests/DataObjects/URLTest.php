<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\URL;
use JustSteveKing\HttpHelpers\Enums\Scheme;
use JustSteveKing\ParameterBag\ParameterBag;

it('can create a url', function (string $url): void {
    expect(
        URL::fromString(
            url: $url,
        ),
    )->toBeInstanceOf(URL::class);
})->with('urls');

it('can turn a URL back into a string', function (): void {
    $url = new URL(
        scheme: Scheme::HTTPS,
        host: 'www.juststeveking.uk',
        path: '/',
    );

    expect(
        $url->toString(),
    )->toBeString()->toEqual('https://www.juststeveking.uk/');
});

it('can work with query parameters', function (): void {
    $url = new URL(
        scheme: Scheme::HTTPS,
        host: 'api.com',
        path: '/resource',
    );

    $url->query = new ParameterBag();
    $url->query->set(
        key: 'foo',
        value: 'bar',
    );

    expect(
        $url->toString(),
    )->toBeString()->toEqual('https://api.com/resource?foo=bar');
});
