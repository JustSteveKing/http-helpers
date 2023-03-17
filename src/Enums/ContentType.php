<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\Enums;

enum ContentType: string
{
    case JSON = 'application/json';
    case XML = 'application/xml';
    case HTML = 'text/html';
}
