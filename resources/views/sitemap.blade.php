{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($staticUrls as $item)
    <url>
        <loc>{{ $item['loc'] }}</loc>
        <changefreq>{{ $item['changefreq'] }}</changefreq>
        <priority>{{ $item['priority'] }}</priority>
    </url>
    @endforeach

    @foreach ($posts as $post)
    <url>
        <loc>{{ rtrim(url('/blog/' . $post->slug), '/') }}/</loc>
        <lastmod>{{ ($post->updated_at ?? $post->published_at ?? now())->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($tags as $tag)
    <url>
        <loc>{{ rtrim(url('/blog/tag/' . $tag->slug), '/') }}/</loc>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>
