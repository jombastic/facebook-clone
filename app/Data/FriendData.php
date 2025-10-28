<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

/** @typescript */
class FriendData extends Data
{
    public function __construct(
        public int $id,
        public string $firstname,
        public string $lastname,
        public ?int $picId,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: ' M D Y')]
        public Carbon $created_at
    ) {}

    public static function fromModel(\App\Models\Friend $friend): self
    {
        return new self(
            $friend->id,
            $friend->firstname,
            $friend->lastname,
            $friend->picId,
            $friend->created_at
        );
    }
}
