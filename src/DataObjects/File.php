<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects;

use JustSteveKing\HttpHelpers\Exceptions\CannotParseFile;
use JustSteveKing\HttpHelpers\Exceptions\FileDoesNotExist;

final class File
{
    public function __construct(
        public readonly string $directory,
        public readonly string $name,
        public readonly string $extension,
        public readonly string $filename,
    ) {}

    public static function fromPath(string $path): File
    {
        if (! file_exists(filename: $path)) {
            throw new FileDoesNotExist(
                message: "Cannot find file: [$path].",
            );
        }

        /**
         * @var array{dirname: string, basename: string, extension: string, filename: string} $info
         */
        $info = pathinfo(
            path: $path,
        );

        return new File(
            directory: $info['dirname'],
            name: $info['basename'],
            extension: $info['extension'],
            filename: $info['filename'],
        );
    }

    public function toArray(): array
    {
        return [
            'directory' => $this->directory,
            'name' => $this->name,
            'extension' => $this->extension,
            'filename' => $this->filename,
        ];
    }
}
