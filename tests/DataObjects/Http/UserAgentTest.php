<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\Header;
use JustSteveKing\HttpHelpers\DataObjects\Http\Headers\UserAgent;

it('can create a new user agent', function (string $ua): void {
    expect(
        new UserAgent(
            value: $ua,
        ),
    )->toBeInstanceOf(UserAgent::class);
})->with('useragents');

it('can turn a user agent into a header', function (string $ua): void {
    expect(
        (new UserAgent(
            value: $ua,
        ))->toHeader(),
    )->toBeInstanceOf(Header::class);
})->with('useragents');

it('can turn a user agent into an array', function (string $ua): void {
    expect(
        (new UserAgent(
            value: $ua,
        ))->toArray(),
    )->toBeArray()->toEqual([
        'User-Agent' => $ua,
    ]);
})->with('useragents');
