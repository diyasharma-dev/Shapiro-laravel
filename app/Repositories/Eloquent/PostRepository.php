<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function getPaginated(int $perPage = 9, ?string $search = null, ?string $tagSlug = null, ?int $page = null): LengthAwarePaginator
    {
        $query = Post::published()->with(['tags', 'categories']);

        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if (! empty($tagSlug)) {
            $query->whereHas('tags', function ($q) use ($tagSlug) {
                $q->where('slug', $tagSlug);
            });
        }

        return $query->paginate(perPage: $perPage, page: $page);
    }

    public function findBySlug(string $slug): ?Post
    {
        return Post::published()
            ->with(['tags', 'categories'])
            ->where('slug', $slug)
            ->first();
    }

    public function getRecentPosts(int $limit = 5): Collection
    {
        return Post::published()
            ->limit($limit)
            ->get();
    }

    public function getRelatedPosts(Post $post, int $limit = 3): Collection
    {
        $tagIds = $post->tags->pluck('id')->toArray();

        return Post::published()
            ->where('id', '!=', $post->id)
            ->where(function ($query) use ($tagIds) {
                if (! empty($tagIds)) {
                    $query->whereHas('tags', function ($q) use ($tagIds) {
                        $q->whereIn('tags.id', $tagIds);
                    });
                }
            })
            ->limit($limit)
            ->get();
    }

    public function incrementViews(Post $post): void
    {
        $post->increment('views_count');
    }
}
