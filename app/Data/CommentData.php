<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\AutoWhenLoadedLazy;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class CommentData extends Data
{
    /**
     * @param Lazy|Collection<int, UserData> $user
     */
    public function __construct(
        public int $id,
        public string $text,
        #[AutoWhenLoadedLazy]
        public Lazy|UserData $user,
    ) {}
}
