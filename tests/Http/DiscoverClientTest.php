<?php

declare(strict_types=1);

use Http\Client\HttpClient;
use JustSteveKing\HttpHelpers\Http\DiscoverClient;

it('can discover the installed HTTP client', function (): void {
    expect(
        DiscoverClient::discover(),
    )->toBeInstanceOf(HttpClient::class);
});
