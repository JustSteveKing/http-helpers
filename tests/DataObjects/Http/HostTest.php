<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\Header;
use JustSteveKing\HttpHelpers\DataObjects\Http\Host;

it('can create a new host', function (string $host): void {
    expect(
        new Host(
            value: $host,
        ),
    )->toBeInstanceOf(Host::class);
})->with('hosts');

it('can turn a host into a header', function (string $host): void {
    expect(
        (new Host(
            value: $host,
        ))->toHeader(),
    )->toBeInstanceOf(Header::class);
})->with('hosts');

it('can turn a host into an array', function (string $host): void {
    expect(
        (new Host(
            value: $host,
        ))->toArray(),
    )->toBeArray()->toEqual([
        'Host' => $host,
    ]);
})->with('hosts');
