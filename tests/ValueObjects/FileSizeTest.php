<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\Exceptions\FileDoesNotExist;
use JustSteveKing\HttpHelpers\ValueObjects\FileSize;

it('can build a new file size', function (): void {
    $file = __DIR__ . '/../../composer.json';

    expect(
        FileSize::fromPath(
            path: $file,
        ),
    )->toBeInstanceOf(FileSize::class);
});

it('can get the size of a file', function (): void {
    $file = __DIR__ . '/../../composer.json';

    expect(
        FileSize::fromPath(
            path: $file,
        )->size,
    )->toBeInt()->toEqual(\filesize($file));
});

it('throws an exception if the file does not exist', function (string $path): void {
    FileSize::fromPath(
        path: $path,
    );
})->with('files')->throws(FileDoesNotExist::class);

it('can get the size in bytes', function (): void {
    $file = __DIR__ . '/../../composer.json';

    expect(
        FileSize::fromPath(
            path: $file,
        )->bytes(),
    )->toBeInt()->toEqual(\filesize($file));
});

it('can get the size in kilobytes', function (): void {
    expect(
        (new FileSize(
            size: 1,
        ))->kilobytes(),
    )->toBeInt()->toEqual(1024);
});

it('can get the size in megabytes', function (): void {
    expect(
        (new FileSize(
            size: 1,
        ))->megabytes(),
    )->toBeInt()->toEqual(1024 * 1024);
});

it('can get the size in gigabytes', function (): void {
    expect(
        (new FileSize(
            size: 1,
        ))->gigabytes(),
    )->toBeInt()->toEqual(1024 * 1024 * 1024);
});

