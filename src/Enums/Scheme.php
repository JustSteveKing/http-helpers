<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\Enums;

enum Scheme: string
{
    case HTTP = 'http';
    case HTTPS = 'https';
}
