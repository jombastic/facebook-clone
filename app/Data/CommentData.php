<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\AutoWhenLoadedLazy;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Optional;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class CommentData extends Data
{
    /**
     * @param Lazy|Collection<int, UserData> $user
     */
    public function __construct(
        public Optional|null|int $id,
        public Optional|string $text,
        #[AutoWhenLoadedLazy]
        public Lazy|Optional|UserData $user,
        public Optional|null|int $userId,
        public Optional|null|int $postId
    ) {}

    public static function rules(): array
    {
        return [
            'text' => ['required', 'string'],
            'postId' => ['required', 'integer'],
        ];
    }
}
