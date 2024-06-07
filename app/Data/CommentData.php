<?php

namespace App\Data;

use App\Models\Comment;
use Spatie\LaravelData\Data;

class CommentData extends Data
{
    public function __construct(
        public int $id,
        public string $text,
        public UserData $user
    ) {
    }

    public static function fromModel(Comment $comment): self
    {
        return new self(
            $comment->id,
            $comment->text,
            UserData::from($comment->user)
        );
    }
}
