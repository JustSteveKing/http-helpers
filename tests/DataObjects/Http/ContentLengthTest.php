<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\Header;
use JustSteveKing\HttpHelpers\DataObjects\Http\ContentLength;

it('can create a new Content Length Object', function (int $number): void {
    expect(
        new ContentLength(
            value: $number,
        ),
    )->toBeInstanceOf(ContentLength::class);
})->with('numbers');

it('can turn an content length into a header', function (int $number): void {
    expect(
        (new ContentLength(
            value: $number,
        ))->toHeader(),
    )->toBeInstanceOf(Header::class);
})->with('numbers');

it('can turn the content length into an array', function (int $number): void {
    expect(
        (new ContentLength(
            value: $number,
        ))->toArray(),
    )->toBeArray()->toEqual([
        'Content-Length' => $number,
    ]);
})->with('numbers');
