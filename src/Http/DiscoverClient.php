<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\Http;

use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;

final class DiscoverClient
{
    /**
     * Discover a PSR-18 client you have installed.
     *
     * @see php-http/guzzle6-adapter
     * @return HttpClient
     */
    public static function discover(): HttpClient
    {
        return HttpClientDiscovery::find();
    }
}
