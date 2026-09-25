<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Services\SeoService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        protected BlogService $blogService,
        protected SeoService $seoService
    ) {}

    public function index(): View
    {
        $recentPosts = $this->blogService->getRecentPosts(3);

        $seo = $this->seoService->forPage(
            title: 'New York Personal Injury Lawyer No Fee Unless We Win Shapiro',
            description: 'Injured in New York? Get compensation for car accidents, slip & falls, construction injuries, and workers’ comp claims. Free consultation today.',
            canonicalUrl: url('/')
        );

        return view('pages.home', compact('recentPosts', 'seo'));
    }
}
