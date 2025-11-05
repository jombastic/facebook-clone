<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\Attributes\AutoWhenLoadedLazy;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
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
        #[AutoWhenLoadedLazy]
        public Lazy|Collection $friends
    ) {}
}
