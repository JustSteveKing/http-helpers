<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\ValueObjects;

use JustSteveKing\HttpHelpers\Contracts\ValueObjects\ValueObjectContract;
use JustSteveKing\HttpHelpers\Exceptions\FileDoesNotExist;

final class FileSize implements ValueObjectContract
{
    public function __construct(
        public readonly int $size,
    ) {}

    public static function fromPath(string $path): FileSize
    {
        if (! file_exists(filename: $path)) {
            throw new FileDoesNotExist(
                message: "Cannot find file at path: [$path].",
            );
        }

        return new FileSize(
            size: \Safe\filesize(filename: $path),
        );
    }
}