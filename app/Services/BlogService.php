<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class BlogService
{
    public function __construct(
        protected PostRepositoryInterface $postRepository
    ) {}

    public function getPaginatedPosts(int $perPage = 9, ?string $search = null, ?string $tagSlug = null, ?int $page = null): LengthAwarePaginator
    {
        return $this->postRepository->getPaginated($perPage, $search, $tagSlug, $page);
    }

    public function getPostBySlug(string $slug): ?Post
    {
        $post = $this->postRepository->findBySlug($slug);
        if ($post) {
            $this->postRepository->incrementViews($post);
        }

        return $post;
    }

    public function getRecentPosts(int $limit = 5): Collection
    {
        return $this->postRepository->getRecentPosts($limit);
    }

    public function getRelatedPosts(Post $post, int $limit = 3): Collection
    {
        return $this->postRepository->getRelatedPosts($post, $limit);
    }

    public function getAllTags(): Collection
    {
        return Tag::has('posts')->withCount('posts')->orderBy('name')->get();
    }
}
