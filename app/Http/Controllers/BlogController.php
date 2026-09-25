<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\BlogService;
use App\Services\SeoService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct(
        protected BlogService $blogService,
        protected SeoService $seoService
    ) {}

    public function index(Request $request, ?int $page = null): View
    {
        $search = $request->query('s');
        $currentPage = $page ?: (int) $request->query('page', 1);
        $posts = $this->blogService->getPaginatedPosts(perPage: 9, search: $search, page: $currentPage);
        $recentPosts = $this->blogService->getRecentPosts(5);
        $tags = $this->blogService->getAllTags();

        $siteSuffix = "Adam L. Shapiro & Associates, P.C. \u{2013} Personal Injury & Motorcycle Accident Lawyers in Queens & Forest Hills NYC";

        if ($search) {
            $seoTitle = "Search results for '{$search}' | Blog - Shapiro The Hero";
            $seoDescription = 'Read expert legal commentary, case breakdowns, and injury rights information from New York personal injury attorneys at Shapiro The Hero.';
            $canonical = url('/blog/');
        } elseif ($currentPage > 1) {
            $seoTitle = "Blog - Page {$currentPage} of {$posts->lastPage()} - {$siteSuffix}";
            $seoDescription = "Page {$currentPage} of legal commentary, injury guides, and case strategy insights from Adam L. Shapiro & Associates, P.C. in New York.";
            $canonical = url("/blog/page/{$currentPage}/");
        } else {
            $seoTitle = "Blog - {$siteSuffix}";
            $seoDescription = 'Explore legal insights, case updates, and personal injury advice from Adam L. Shapiro & Associates, P.C. — serving Queens and New York City accident victims.';
            $canonical = url('/blog/');
        }

        $seo = $this->seoService->forPage(
            title: $seoTitle,
            description: $seoDescription,
            canonicalUrl: $canonical
        );

        return view('blog.index', compact('posts', 'recentPosts', 'tags', 'search', 'seo'));
    }

    public function show(string $slug): View
    {
        $post = $this->blogService->getPostBySlug($slug);

        if (! $post) {
            abort(404, 'Article not found');
        }

        $relatedPosts = $this->blogService->getRelatedPosts($post, 3);
        $recentPosts = $this->blogService->getRecentPosts(5);
        $tags = $this->blogService->getAllTags();
        $seo = $this->seoService->forPost($post);

        return view('blog.show', compact('post', 'relatedPosts', 'recentPosts', 'tags', 'seo'));
    }

    public function byTag(Request $request, string $slug, ?int $page = null): View
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $currentPage = $page ?: (int) $request->query('page', 1);
        $posts = $this->blogService->getPaginatedPosts(perPage: 9, tagSlug: $slug, page: $currentPage);
        $recentPosts = $this->blogService->getRecentPosts(5);
        $tags = $this->blogService->getAllTags();

        $siteSuffix = "Adam L. Shapiro & Associates, P.C. \u{2013} Personal Injury & Motorcycle Accident Lawyers in Queens & Forest Hills NYC";

        if ($currentPage > 1) {
            $seoTitle = "{$tag->name} Archives - Page {$currentPage} of {$posts->lastPage()} - {$siteSuffix}";
            $seoDescription = "Page {$currentPage} of legal articles and expert commentary on {$tag->name} from Adam L. Shapiro & Associates, P.C. in New York.";
            $canonical = url("/blog/tag/{$slug}/page/{$currentPage}/");
        } else {
            $seoTitle = "{$tag->name} Archives - {$siteSuffix}";
            $seoDescription = "Explore legal articles, injury guides, and case insights regarding {$tag->name} from Adam L. Shapiro & Associates, P.C. in New York. Call (970) 742-7476.";
            $canonical = url("/blog/tag/{$slug}/");
        }

        $seo = $this->seoService->forPage(
            title: $seoTitle,
            description: $seoDescription,
            canonicalUrl: $canonical
        );

        return view('blog.index', compact('posts', 'recentPosts', 'tags', 'tag', 'seo'));
    }

    public function service(string $slug): View
    {
        $siteSuffix = "Adam L. Shapiro & Associates, P.C. \u{2013} Personal Injury & Motorcycle Accident Lawyers in Queens & Forest Hills NYC";

        $services = [
            'medical-malpractice' => [
                'title' => "Medical Malpractice & Surgical Errors - {$siteSuffix}",
                'description' => "Surgical errors. Misdiagnoses. Birth injuries. Medication mistakes. These cases require medical experts and a team that will not back down when the hospital\u{2019}s legal department shows up. Adam spent years inside the machine. He knows how institutional defendants fight these claims.",
                'heading' => 'Medical Malpractice & Surgical Errors',
                'content' => "<p><span style=\"font-weight: 400;\">Surgical errors. Misdiagnoses. Birth injuries. Medication mistakes. These cases require medical experts and a team that will not back down when the hospital\u{2019}s legal department shows up. Adam spent years inside the machine. He knows how institutional defendants fight these claims.</span></p>",
                'image' => '/assets/media/practice-areas/medical-malpractice-attorney.png',
                'image_alt' => 'Medical Malpractice & Surgical Errors',
                'practice_url' => '/medical-malpractice/',
                'practice_title' => 'Explore Full Medical Malpractice Practice Area',
            ],
            'motor-vehicle-accidents' => [
                'title' => "E-Bike & Electric Scooter Accidents - {$siteSuffix}",
                'description' => 'Most NYC cycling fatalities involve e-bikes, and these crashes cause traumatic brain injuries, fractures, and spinal damage. No-fault insurance does not automatically apply the way it does with cars. Liability can fall on a negligent driver, a rental company, or a product manufacturer. We find every liable party and deploy every available claim.',
                'heading' => 'E-Bike & Electric Scooter Accidents',
                'content' => '<p><span style=\"font-weight: 400;\">Most NYC cycling fatalities involve e-bikes, and these crashes cause traumatic brain injuries, fractures, and spinal damage. No-fault insurance does not automatically apply the way it does with cars. Liability can fall on a negligent driver, a rental company, or a product manufacturer. We find every liable party and deploy every available claim.</span></p>',
                'image' => '/assets/media/practice-areas/electric-bicycle-scooter-lawyer.jpg',
                'image_alt' => 'E-Bike & Electric Scooter Accidents',
                'practice_url' => '/electrical-bicycle-scooter/',
                'practice_title' => 'Explore Full E-Bike & Scooter Practice Area',
            ],
            'workers-compensation' => [
                'title' => "Workers' Compensation in New York - {$siteSuffix}",
                'description' => "Your employer\u{2019}s workers\u{2019} comp insurer is not neutral. Their job is to close your claim cheap. We handle full compensation proceedings and investigate whether a third party carries separate personal injury liability. That can mean two claims running at once, maximizing everything you recover.",
                'heading' => 'Workers\' Compensation in New York',
                'content' => "<p><span style=\"font-weight: 400;\">Your employer\u{2019}s workers\u{2019} comp insurer is not neutral. Their job is to close your claim cheap. We handle full compensation proceedings and investigate whether a third party carries separate personal injury liability. That can mean two claims running at once, maximizing everything you recover.</span></p>",
                'image' => '/assets/media/practice-areas/workers-compensation-lawyer.jpg',
                'image_alt' => 'Workers\' Compensation in New York',
                'practice_url' => '/workers-compensation/',
                'practice_title' => 'Explore Full Workers\' Compensation Practice Area',
            ],
            'any-motor-vehicle' => [
                'title' => "Any Motor Vehicle Accident \u{2014} Cars, Trucks, Motorcycles, Boats & More - {$siteSuffix}",
                'description' => 'Cars. Trucks. Buses. Motorcycles. Rideshares. Boats. ATVs. If a motor vehicle caused your injury, we fight for you. We know the serious injury threshold that unlocks full compensation under New York law. We know what evidence disappears if you wait. Call us before you call the insurance company. That order matters.',
                'heading' => 'Any Motor Vehicle Accident — Cars, Trucks, Motorcycles, Boats & More',
                'content' => '<p><span style=\"font-weight: 400;\">Cars. Trucks. Buses. Motorcycles. Rideshares. Boats. ATVs. If a motor vehicle caused your injury, we fight for you. We know the serious injury threshold that unlocks full compensation under New York law. We know what evidence disappears if you wait. Call us before you call the insurance company. That order matters.</span></p>',
                'image' => '/assets/media/practice-areas/motor-vehicle-accident-lawyer.jpg',
                'image_alt' => 'Any Motor Vehicle Accident — Cars, Trucks, Motorcycles, Boats & More',
                'practice_url' => '/any-motor-vehicle/',
                'practice_title' => 'Explore Full Motor Vehicle Practice Area',
            ],
            'personal-injury' => [
                'title' => "Personal Injury - {$siteSuffix}",
                'description' => "Someone\u{2019}s negligence put you in a hospital bed. Now their insurance company is working to minimize what they pay you. We fight for injury victims across New York and Florida, from catastrophic accidents to serious injuries that change lives permanently. We move fast. We build strong. We recover every dollar available to you.",
                'heading' => 'Personal Injury',
                'content' => "<p><span style=\"font-weight: 400;\">Someone\u{2019}s negligence put you in a hospital bed. Now their insurance company is working to minimize what they pay you. We fight for injury victims across New York and Florida, from catastrophic accidents to serious injuries that change lives permanently. We move fast. We build strong. We recover every dollar available to you.</span></p>",
                'image' => '/assets/media/practice-areas/personal-injury-lawyer.jpg',
                'image_alt' => 'Personal Injury',
                'practice_url' => '/personal-injury-lawyer-new-york/',
                'practice_title' => 'Explore Full Personal Injury Practice Area',
            ],
            'slip-trip-fall' => [
                'title' => "Slip/Trip & Fall - {$siteSuffix}",
                'description' => "Wet floors. Broken stairs. Cracked sidewalks. The property owner\u{2019}s insurer will try to make it your fault. We crush that argument. Critical rule: if a city or municipal property caused your injury, a Notice of Claim must be filed within 90 days. Miss that window and the case is gone. We move fast.",
                'heading' => 'Slip/Trip & Fall',
                'content' => "<p><span style=\"font-weight: 400;\">Wet floors. Broken stairs. Cracked sidewalks. The property owner\u{2019}s insurer will try to make it your fault. We crush that argument. Critical rule: if a city or municipal property caused your injury, a Notice of Claim must be filed within 90 days. Miss that window and the case is gone. We move fast.</span></p>",
                'image' => '/assets/media/practice-areas/slip-trip-fall-attorney.jpg',
                'image_alt' => 'Slip/Trip & Fall',
                'practice_url' => '/slip-trip-fall/',
                'practice_title' => 'Explore Full Slip & Fall Practice Area',
            ],
        ];

        if (! isset($services[$slug])) {
            abort(404, 'Service article not found');
        }

        $service = $services[$slug];
        $recentPosts = $this->blogService->getRecentPosts(5);
        $tags = $this->blogService->getAllTags();

        $seo = $this->seoService->forPage(
            title: $service['title'],
            description: $service['description'],
            canonicalUrl: url("/blog/service/{$slug}/"),
            image: $service['image']
        );

        return view('blog.service', compact('service', 'recentPosts', 'tags', 'seo'));
    }
}
