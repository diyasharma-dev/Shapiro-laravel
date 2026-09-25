<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $baseUrl = rtrim(url('/'), '/');

        $staticUrls = [
            ['loc' => $baseUrl.'/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/about-us/', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/services/', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/personal-injury-lawyer-new-york/', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/any-motor-vehicle/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/slip-trip-fall/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/workers-compensation/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/medical-malpractice/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/wrongful-death/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/construction-accident/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/electrical-bicycle-scooter/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/high-profiles-cases/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/awards/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/career/', 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/references-recommendations/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/contact-us/', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/blog/', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => $baseUrl.'/blog/service/medical-malpractice/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/blog/service/motor-vehicle-accidents/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/blog/service/workers-compensation/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/blog/service/any-motor-vehicle/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/blog/service/personal-injury/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/blog/service/slip-trip-fall/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl.'/disclaimer/', 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => $baseUrl.'/privacy-policy/', 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => $baseUrl.'/terms-conditions/', 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => $baseUrl.'/attorney-advertising/', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        $posts = Post::published()->get(['slug', 'updated_at', 'published_at']);
        $tags = Tag::has('posts')->get(['slug', 'updated_at']);

        $content = view('sitemap', compact('staticUrls', 'posts', 'tags'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
