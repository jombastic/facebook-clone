<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostService
{
    /**
     * Build the base query with common eager loading and ordering.
     */
    private function buildBaseQuery(): Builder
    {
        return Post::query()
            ->select(['id', 'text', 'image', 'created_at', 'user_id'])
            ->with([
                'user:id,name,image',
                'comments:id,text,post_id,user_id',
                'comments.user:id,name,image',
            ])
            ->orderBy('created_at', 'desc');
    }

    /**
     * Get all posts.
     */
    public function getAllPosts(): Collection
    {
        return $this->buildBaseQuery()->get();
    }

    /**
     * Get all posts.
     */
    public function getLatestPost(): ?Post
    {
        return $this->buildBaseQuery()->orderBy('created_at', 'desc')->first();
    }

    /**
     * Get posts for a specific user.
     */
    public function getPostsForUser(int $userId): Collection
    {
        return $this->buildBaseQuery()
            ->where('user_id', $userId)
            ->get();
    }

    /**
     * Get posts for a specific user.
     */
    public function getLatestPostForUser(int $userId): ?Post
    {
        return $this->buildBaseQuery()
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    /**
     * Get posts for the logged in user.
     */
    public function getPostsForCurrentUser(): Collection
    {
        return auth()->user()->load([
            'posts' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'posts.user:id,name,image',
            'posts.comments:id,text,post_id,user_id',
            'posts.comments.user:id,name,image',
        ])->posts;
    }

    /**
     * Get the latest post for the logged in user.
     */
    public function getLatestPostForCurrentUser(): ?Post
    {
        return auth()->user()
            ->posts()
            ->with([
                'user:id,name,image',
                'comments:id,text,post_id,user_id',
                'comments.user:id,name,image',
            ])
            ->orderBy('created_at', 'desc')
            ->first();
    }
}
