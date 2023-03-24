<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\Header;
use JustSteveKing\HttpHelpers\DataObjects\Http\Headers\ContentType;
use JustSteveKing\HttpHelpers\Enums\Headers\ContentType as ContentTypeEnum;

it('can create a content type object', function (): void {
    expect(
        new ContentType(
            value: ContentTypeEnum::JSON,
        ),
    )->toBeInstanceOf(ContentType::class);
});

it('can turn a content type object into a header', function (): void {
    expect(
        (new ContentType(
            value: ContentTypeEnum::JSON,
        ))->toHeader(),
    )->toBeInstanceOf(Header::class);
});

it('can turn a content type object into an array', function (): void {
    expect(
        (new ContentType(
            value: ContentTypeEnum::JSON,
        ))->toArray(),
    )->toBeArray()->toEqual([
        'Content-Type' => 'application/json',
    ]);
});
