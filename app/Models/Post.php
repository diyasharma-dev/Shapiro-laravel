<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'wp_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'featured_image_alt',
        'author_name',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'seo_metadata',
        'is_published',
        'published_at',
        'views_count',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'seo_metadata' => 'array',
        'views_count' => 'integer',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->whereNotNull('published_at')->orderBy('published_at', 'desc');
    }

    public function getContentAttribute(?string $value): ?string
    {
        if (! $value) {
            return $value;
        }

        $replacement = '<a href="https://shapirothehero.com" target="_blank" rel="noopener noreferrer" class="blog-site-url">https://shapirothehero.com</a>';

        return preg_replace(
            '/<a\s+href="[^"]*(?:\/|\/\?utm_source=[^"]*)">\s*(?:<span[^>]*>)?\/(?:<\/span>)?\s*<\/a>/i',
            $replacement,
            $value
        );
    }

    public function getEstimatedReadingTimeAttribute(): int
    {
        $words = str_word_count(strip_tags($this->content));

        return max(1, (int) ceil($words / 200));
    }
}
