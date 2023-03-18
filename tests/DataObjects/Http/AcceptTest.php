<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\Header;
use JustSteveKing\HttpHelpers\DataObjects\Http\Accept;
use JustSteveKing\HttpHelpers\Enums\ContentType;

it('can create a new accept header', function (): void {
    expect(
        new Accept(
            value: ContentType::JSON,
        ),
    )->toBeInstanceOf(Accept::class);
});

it('can turn the accept header into a header', function (): void {
    expect(
        (new Accept(
            value: ContentType::JSON,
        ))->asHeader(),
    )->toBeInstanceOf(Header::class);
});

it('can turn the accept header into an array', function (): void {
    expect(
        (new Accept(
            value: ContentType::JSON,
        ))->toArray(),
    )->toBeArray()->toEqual([
        'Accept' => 'application/json',
    ]);
});
