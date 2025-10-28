<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

/** @typescript */
class UserData extends Data
{
    /**
     * @param Lazy|Collection<int, FriendData> $friends
     */
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $image,
        public Lazy|Collection|null $friends = null
    ) {}

    public static function fromModel(\App\Models\User $user): self
    {
        return new self(
            $user->id,
            $user->name,
            $user->email,
            $user->image,
            Lazy::create(fn() => FriendData::collect($user->friends))
        );
    }
}
