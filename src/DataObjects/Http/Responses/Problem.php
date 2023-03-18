<?php

declare(strict_types=1);

namespace JustSteveKing\HttpHelpers\DataObjects\Http\Responses;

use JsonException;
use JustSteveKing\HttpHelpers\Contracts\DataObjects\DataObjectContract;

final readonly class Problem implements DataObjectContract
{
    /**
     * @param string $title A short human-readable summary of the problem.
     * @param string $type A URI reference (RFC3986) that identifies the problem type.
     * @link http://tools.ietf.org/html/rfc3986
     *
     * @param int $status The HTTP Status Code of the Problem.
     * @param string $detail A human-readable explanation specific to this occurrence of the problem.
     * @param string $instance A URI reference that identifies the specific occurrence of the problem.
     * @link http://tools.ietf.org/html/rfc3986
     */
    public function __construct(
        public string $title,
        public string $type,
        public int    $status,
        public string $detail,
        public string $instance,
    ) {
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'type' => $this->type,
            'status' => $this->status,
            'detail' => $this->detail,
            'instance' => $this->instance,
        ];
    }

    /**
     * @return string
     * @throws JsonException
     */
    public function toJson(): string
    {
        return json_encode(
            value: $this->toArray(),
            flags: JSON_THROW_ON_ERROR,
        );
    }
}
