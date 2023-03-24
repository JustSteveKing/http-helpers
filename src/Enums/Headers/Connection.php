<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\Enums\Headers;

/**
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Connection
 */
enum Connection: string
{
    case CLOSE = 'close';
    case KEEP_ALIVE = 'keep-alive';
}
