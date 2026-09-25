<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    protected function loadJson(string $path): array
    {
        if (! File::exists($path)) {
            return [];
        }
        $content = File::get($path);
        // Strip UTF-8 BOM if present
        $content = preg_replace('/^\xEF\xBB\xBF/', '', $content);

        return json_decode($content, true) ?: [];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Tags
        $tagsData = $this->loadJson(database_path('data/tags.json'));
        if (! empty($tagsData)) {
            foreach ($tagsData as $t) {
                Tag::updateOrCreate(
                    ['slug' => $t['slug']],
                    ['name' => $t['name']]
                );
            }
            $this->command->info('Seeded '.count($tagsData).' tags.');
        }

        // 2. Seed Categories
        $catData = $this->loadJson(database_path('data/categories.json'));
        if (! empty($catData)) {
            foreach ($catData as $c) {
                Category::updateOrCreate(
                    ['slug' => $c['slug']],
                    [
                        'name' => $c['name'],
                        'description' => $c['description'] ?? null,
                    ]
                );
            }
        } else {
            Category::firstOrCreate(
                ['slug' => 'legal-insights'],
                ['name' => 'Legal Insights', 'description' => 'Legal insights, advice, and updates from Shapiro The Hero']
            );
        }

        // 3. Seed Posts
        $postsData = $this->loadJson(database_path('data/posts.json'));
        if (empty($postsData)) {
            $this->command->warn('No posts found in posts.json');

            return;
        }

        foreach ($postsData as $p) {
            $post = Post::updateOrCreate(
                ['slug' => $p['slug']],
                [
                    'title' => $p['title'],
                    'excerpt' => $p['excerpt'] ?? null,
                    'content' => $p['content'],
                    'featured_image' => $p['featured_image'] ?? null,
                    'featured_image_alt' => $p['featured_image_alt'] ?? null,
                    'author_name' => $p['author_name'] ?? 'Adam L. Shapiro',
                    'meta_title' => $p['meta_title'] ?? null,
                    'meta_description' => $p['meta_description'] ?? null,
                    'meta_keywords' => $p['meta_keywords'] ?? null,
                    'canonical_url' => $p['canonical_url'] ?? null,
                    'seo_metadata' => $p['seo_metadata'] ?? null,
                    'is_published' => $p['is_published'] ?? true,
                    'published_at' => $p['published_at'] ?? now(),
                ]
            );

            // Sync categories
            if (! empty($p['categories'])) {
                $categoryIds = Category::whereIn('slug', $p['categories'])->pluck('id')->toArray();
                if (! empty($categoryIds)) {
                    $post->categories()->sync($categoryIds);
                }
            }

            // Sync tags
            if (! empty($p['tags'])) {
                $tagIds = Tag::whereIn('slug', $p['tags'])->pluck('id')->toArray();
                if (! empty($tagIds)) {
                    $post->tags()->sync($tagIds);
                }
            }
        }

        $this->command->info('Seeded '.count($postsData).' blog posts.');
    }
}
