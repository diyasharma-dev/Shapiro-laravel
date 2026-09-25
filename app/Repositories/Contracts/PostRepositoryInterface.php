<?php

namespace App\Repositories\Contracts;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function getPaginated(int $perPage = 9, ?string $search = null, ?string $tagSlug = null, ?int $page = null): LengthAwarePaginator;

    public function findBySlug(string $slug): ?Post;

    public function getRecentPosts(int $limit = 5): Collection;

    public function getRelatedPosts(Post $post, int $limit = 3): Collection;

    public function incrementViews(Post $post): void;
}
