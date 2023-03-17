<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\Payload;

it('can build a payload', function (string $string): void {
    $payload = new Payload(
        data: [
            $string => $string,
        ],
    );

    expect(
        $payload
    )->toBeInstanceOf(Payload::class);

    expect(
        $payload->toArray(),
    )->toBeArray()->toEqual([
        $string => $string,
    ]);
})->with('strings');
