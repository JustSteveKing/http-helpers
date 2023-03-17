<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\Header;

it('can create a new header', function (string $string) {
    expect(
        (new Header(
            key: $string,
            value: $string,
        ))->toHeader(),
    )->toBeArray()->toEqual([
        $string => $string,
    ]);
})->with('strings');
