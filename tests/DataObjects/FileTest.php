<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\File;
use JustSteveKing\HttpHelpers\Exceptions\FileDoesNotExist;

it('can build a new file', function (): void {
    expect(
        File::fromPath(
            path: __DIR__ . '/../../composer.json',
        ),
    )->toBeInstanceOf(File::class)->name->toEqual('composer.json');
});

it('throws an exception if a file does not exist', function (string $path): void {
    expect(
        File::fromPath(
            path: $path,
        ),
    );
})->with('files')->throws(FileDoesNotExist::class);

it('can return a file as an array', function (): void {
    $info = pathinfo(path: __DIR__ . '/../../composer.json');

    expect(
        File::fromPath(
            path: __DIR__ . '/../../composer.json',
        )->toArray(),
    )->toBeArray()->toEqual([
        'directory' => $info['dirname'],
        'name' => $info['basename'],
        'extension' => $info['extension'],
        'filename' => $info['filename'],
    ]);
});
