<?php

declare(strict_types=1);

use JustSteveKing\HttpHelpers\DataObjects\Http\Responses\Problem;

it('can create a new problem', function (string $string): void {
    expect(
        new Problem(
            title: $string,
            type: $string,
            status: 200,
            detail: $string,
            instance: $string,
        ),
    )->toBeInstanceOf(Problem::class);
})->with('strings');

it('can turn a problem into an array', function (string $string): void {
    expect(
        (new Problem(
            title: $string,
            type: $string,
            status: 200,
            detail: $string,
            instance: $string,
        ))->toArray(),
    )->toBeArray()->toEqual([
        'title' => $string,
        'type' => $string,
        'status' => 200,
        'detail' => $string,
        'instance' => $string,
    ]);
})->with('strings');

it('can turn a problem into a json string', function (string $string): void {
    expect(
        (new Problem(
            title: $string,
            type: $string,
            status: 200,
            detail: $string,
            instance: $string,
        ))->toJson(),
    )->toBeString()->toEqual(json_encode(
        value: [
            'title' => $string,
            'type' => $string,
            'status' => 200,
            'detail' => $string,
            'instance' => $string,
        ],
    ));
})->with('strings');
