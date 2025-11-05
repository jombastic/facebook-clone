<?php

namespace App\Data;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\Attributes\AutoWhenLoadedLazy;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class PostData extends Data
{
    /**
     * @param Lazy|UserData $user
     * @param Lazy|Collection<int, CommentData> $comments
     */
    public function __construct(
        public int $id,
        public string $text,
        public ?string $image,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: ' M D Y')]
        public Carbon $created_at,
        #[AutoWhenLoadedLazy]
        public Lazy|UserData $user,
        #[AutoWhenLoadedLazy]
        public Lazy|Collection $comments,
    ) {}
}
