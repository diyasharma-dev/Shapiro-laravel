<?php

namespace App\Services;

use App\Models\Post;

class SeoService
{
    protected string $siteName = 'Adam L. Shapiro & Associates, P.C. – Personal Injury & Motorcycle Accident Lawyers in Queens & Forest Hills NYC';

    protected string $defaultImage = '/assets/media/branding/shapiro-logo.png';

    public function forPage(string $title, string $description, ?string $canonicalUrl = null, ?string $image = null): array
    {
        $url = $canonicalUrl ?: url()->current();
        $canonical = str_ends_with($url, '/') ? $url : $url.'/';
        $ogImage = $image ? asset($image) : asset($this->defaultImage);

        $schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'LegalService',
                    '@id' => url('/').'/#organization',
                    'name' => 'Adam L. Shapiro & Associates, P.C.',
                    'url' => url('/'),
                    'logo' => asset('/assets/media/branding/shapiro-logo.png'),
                    'telephone' => '+1-970-742-7476',
                    'priceRange' => '$$$',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => '70-20 Austin St Ste 111',
                        'addressLocality' => 'Forest Hills',
                        'addressRegion' => 'NY',
                        'postalCode' => '11375',
                        'addressCountry' => 'US',
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => 40.7209,
                        'longitude' => -73.8448,
                    ],
                    'openingHoursSpecification' => [
                        [
                            '@type' => 'OpeningHoursSpecification',
                            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                            'opens' => '08:00',
                            'closes' => '19:00',
                        ],
                    ],
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => url('/').'/#website',
                    'url' => url('/'),
                    'name' => $this->siteName,
                    'publisher' => ['@id' => url('/').'/#organization'],
                ],
                [
                    '@type' => 'WebPage',
                    '@id' => $canonical,
                    'url' => $canonical,
                    'name' => $title,
                    'description' => $description,
                    'isPartOf' => ['@id' => url('/').'/#website'],
                ],
            ],
        ];

        return [
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'og_title' => $title,
            'og_description' => $description,
            'og_image' => $ogImage,
            'og_url' => $canonical,
            'og_type' => 'website',
            'og_site_name' => $this->siteName,
            'twitter_card' => 'summary_large_image',
            'schema_json' => json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        ];
    }

    public function forPost(Post $post): array
    {
        $canonical = $post->canonical_url ?: url("/blog/{$post->slug}/");
        if (! str_ends_with($canonical, '/')) {
            $canonical .= '/';
        }
        $title = $post->meta_title ?: $post->title.' | Shapiro The Hero';
        $description = $post->meta_description ?: ($post->excerpt ?: substr(strip_tags($post->content), 0, 160));
        $ogImage = $post->featured_image ? asset($post->featured_image) : asset($this->defaultImage);

        $schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Article',
                    '@id' => $canonical.'#article',
                    'isPartOf' => ['@id' => $canonical],
                    'headline' => $post->title,
                    'datePublished' => $post->published_at ? $post->published_at->toIso8601String() : null,
                    'dateModified' => $post->updated_at ? $post->updated_at->toIso8601String() : null,
                    'mainEntityOfPage' => ['@id' => $canonical],
                    'author' => [
                        '@type' => 'Person',
                        'name' => $post->author_name ?: 'Adam L. Shapiro',
                    ],
                    'publisher' => [
                        '@type' => 'Organization',
                        'name' => 'Adam L. Shapiro & Associates, P.C.',
                        'logo' => [
                            '@type' => 'ImageObject',
                            'url' => asset('/assets/media/branding/shapiro-logo.png'),
                        ],
                    ],
                    'image' => [
                        '@type' => 'ImageObject',
                        'url' => $ogImage,
                    ],
                    'description' => $description,
                ],
                [
                    '@type' => 'BreadcrumbList',
                    '@id' => $canonical.'#breadcrumb',
                    'itemListElement' => [
                        [
                            '@type' => 'ListItem',
                            'position' => 1,
                            'name' => 'Home',
                            'item' => url('/'),
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 2,
                            'name' => 'Blog',
                            'item' => url('/blog'),
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 3,
                            'name' => $post->title,
                            'item' => $canonical,
                        ],
                    ],
                ],
            ],
        ];

        return [
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'og_title' => $title,
            'og_description' => $description,
            'og_image' => $ogImage,
            'og_url' => $canonical,
            'og_type' => 'article',
            'og_site_name' => $this->siteName,
            'twitter_card' => 'summary_large_image',
            'article_published_time' => $post->published_at ? $post->published_at->toIso8601String() : null,
            'schema_json' => json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        ];
    }
}
