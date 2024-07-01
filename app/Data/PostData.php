<?php

namespace App\Data;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

/** @typescript */
class PostData extends Data
{
    /**
     * @param Lazy|Collection<int, CommentData> $comments
     */
    public function __construct(
        public int $id,
        public string $text,
        public ?string $image,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: ' M D Y')]
        public Carbon $created_at,
        public Lazy|Collection $comments,
        public UserData $user
    ) {
    }

    public static function fromModel(Post $post): self
    {
        return new self(
            $post->id,
            $post->text,
            $post->image,
            $post->created_at,
            Lazy::create(fn() => CommentData::collect($post->comments))->defaultIncluded(),
            UserData::from($post->user)
        );
    }
}
