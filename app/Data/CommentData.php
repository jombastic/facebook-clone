<?php

namespace App\Data;

use App\Models\Comment;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Data;

/**
 * @param Lazy|Collection<int, UserData> $user
 */
class CommentData extends Data
{
    public function __construct(
        public int $id,
        public string $text,
        public Lazy|UserData $user,
    ) {}

    public static function fromModel(Comment $comment): self
    {
        return new self(
            $comment->id,
            $comment->text,
            Lazy::create(fn() => UserData::from($comment->user))
        );
    }
}
