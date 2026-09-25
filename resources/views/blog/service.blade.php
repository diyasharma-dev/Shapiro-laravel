@extends('layouts.app')

@push('styles')
<style>
    .service-single-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 360px;
        gap: 3.5rem;
        align-items: start;
        width: 100%;
        max-width: 100%;
    }
    .service-single-layout article {
        min-width: 0;
        max-width: 100%;
    }
    .service-single-layout aside {
        min-width: 0;
        width: 100%;
        max-width: 360px;
    }
    .service-content {
        font-size: 1.15rem;
        line-height: 1.85;
        color: var(--color-gray-800);
        margin-bottom: 2.5rem;
    }
    .service-featured-image {
        width: 100%;
        max-height: 480px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-md);
    }
    @media (max-width: 991px) {
        .service-single-layout {
            grid-template-columns: 1fr;
            gap: 2.5rem;
        }
        .service-single-layout aside {
            max-width: 100%;
        }
    }
</style>
@endpush

@section('content')
<section class="section" style="padding: 3rem 0 5rem; background: var(--color-bg);">
    <div class="container">
        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" style="margin-bottom: 2rem;">
            <ol style="display: flex; gap: 0.5rem; align-items: center; list-style: none; padding: 0; margin: 0; font-size: 0.875rem; color: var(--color-text-muted); flex-wrap: wrap;">
                <li><a href="{{ route('home') }}" style="color: var(--color-primary); text-decoration: none; font-weight: 600;">Home</a></li>
                <li style="color: #94a3b8;">/</li>
                <li><a href="{{ route('services') }}" style="color: var(--color-primary); text-decoration: none; font-weight: 600;">Practice Areas</a></li>
                <li style="color: #94a3b8;">/</li>
                <li style="color: #64748b; font-weight: 500;" aria-current="page">{{ $service['heading'] }}</li>
            </ol>
        </nav>

        <div class="service-single-layout">
            {{-- Main Article Content --}}
            <article class="card" style="background: #ffffff; border: 1px solid var(--color-border); border-radius: var(--radius-xl); padding: 2.5rem; box-shadow: var(--shadow-sm);">
                <header style="margin-bottom: 2rem; border-bottom: 1px solid var(--color-border); padding-bottom: 1.5rem;">
                    <div style="display: inline-block; background: rgba(30, 58, 138, 0.08); color: var(--color-primary); font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; padding: 0.35rem 0.85rem; border-radius: var(--radius-full); margin-bottom: 1rem;">
                        New York Legal Service Guide
                    </div>
                    <h1 class="heading-lg" style="color: var(--color-primary); line-height: 1.25; margin-bottom: 1rem;">
                        {{ $service['heading'] }}
                    </h1>
                    <div style="display: flex; align-items: center; gap: 1.5rem; color: var(--color-text-muted); font-size: 0.875rem;">
                        <span><strong>Author:</strong> Adam L. Shapiro &amp; Associates</span>
                        <span>&bull;</span>
                        <span><strong>Est. reading time:</strong> 2 mins</span>
                    </div>
                </header>

                @if(!empty($service['image']))
                <div style="margin-bottom: 2rem;">
                    <img src="{{ asset($service['image']) }}" alt="{{ $service['image_alt'] }}" class="service-featured-image">
                </div>
                @endif

                <div class="service-content">
                    {!! $service['content'] !!}
                </div>

                {{-- Action Callout to Main Practice Area --}}
                <div style="background: var(--color-bg-alt); border-left: 4px solid var(--color-primary); border-radius: 0 var(--radius-lg) var(--radius-lg) 0; padding: 1.75rem 2rem; margin-bottom: 3rem;">
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--color-primary); margin-bottom: 0.5rem; font-family: var(--font-heading);">
                        Need Detailed Legal Guidance for this Practice Area?
                    </h3>
                    <p style="font-size: 0.95rem; color: var(--color-text-muted); line-height: 1.6; margin-bottom: 1.25rem;">
                        Visit our comprehensive practice area guide for full case qualifications, statute of limitations deadlines, compensation structures, and recent results.
                    </p>
                    <a href="{{ $service['practice_url'] }}" class="btn btn-accent btn-md" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                        <span>{{ $service['practice_title'] }}</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                    </a>
                </div>

                {{-- Urgent Consultation Box --}}
                <div style="background: linear-gradient(135deg, #0b1b3d 0%, #1e3a8a 100%); border-radius: var(--radius-lg); padding: 2.25rem; color: #ffffff; text-align: center;">
                    <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #fcd34d; display: block; margin-bottom: 0.5rem;">Free Immediate Case Evaluation</span>
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: #ffffff; margin-bottom: 0.75rem; font-family: var(--font-heading);">
                        Hurt In New York? We Fight For Maximum Financial Recovery.
                    </h3>
                    <p style="font-size: 0.95rem; line-height: 1.6; color: #cbd5e1; max-width: 600px; margin: 0 auto 1.5rem;">
                        Never speak to an insurance adjuster without legal representation. Consultations are 100% free and confidential with no fee unless we win.
                    </p>
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="tel:+19707427476" class="btn btn-accent btn-lg">
                            <span>Call (970) SHAPIRO</span>
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-white btn-lg">
                            <span>Book Consultation Online</span>
                        </a>
                    </div>
                </div>
            </article>

            {{-- Sidebar --}}
            <aside>
                {{-- Practice Areas Widget --}}
                <div class="card" style="background: #ffffff; border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: 1.75rem; margin-bottom: 2rem;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--color-primary); margin-bottom: 1.25rem; font-family: var(--font-heading); border-bottom: 2px solid var(--color-border); padding-bottom: 0.5rem;">
                        Practice Areas
                    </h3>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.6rem;">
                        <li><a href="{{ route('practice.personal-injury') }}" style="color: var(--color-text); text-decoration: none; font-size: 0.95rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center;"><span>Personal Injury</span> &rarr;</a></li>
                        <li><a href="{{ route('practice.motor-vehicle') }}" style="color: var(--color-text); text-decoration: none; font-size: 0.95rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center;"><span>Motor Vehicle Accidents</span> &rarr;</a></li>
                        <li><a href="{{ route('practice.slip-trip-fall') }}" style="color: var(--color-text); text-decoration: none; font-size: 0.95rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center;"><span>Slip, Trip &amp; Fall</span> &rarr;</a></li>
                        <li><a href="{{ route('practice.workers-compensation') }}" style="color: var(--color-text); text-decoration: none; font-size: 0.95rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center;"><span>Workers' Compensation</span> &rarr;</a></li>
                        <li><a href="{{ route('practice.medical-malpractice') }}" style="color: var(--color-text); text-decoration: none; font-size: 0.95rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center;"><span>Medical Malpractice</span> &rarr;</a></li>
                        <li><a href="{{ route('practice.wrongful-death') }}" style="color: var(--color-text); text-decoration: none; font-size: 0.95rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center;"><span>Wrongful Death</span> &rarr;</a></li>
                        <li><a href="{{ route('practice.construction-accident') }}" style="color: var(--color-text); text-decoration: none; font-size: 0.95rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center;"><span>Construction Accidents</span> &rarr;</a></li>
                        <li><a href="{{ route('practice.ebike-scooter') }}" style="color: var(--color-text); text-decoration: none; font-size: 0.95rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center;"><span>E-Bike &amp; Scooter</span> &rarr;</a></li>
                    </ul>
                </div>

                {{-- Recent Posts Widget --}}
                @if(isset($recentPosts) && $recentPosts->count())
                <div class="card" style="background: #ffffff; border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: 1.75rem; margin-bottom: 2rem;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--color-primary); margin-bottom: 1.25rem; font-family: var(--font-heading); border-bottom: 2px solid var(--color-border); padding-bottom: 0.5rem;">
                        Recent Legal Insights
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach($recentPosts as $post)
                        <div>
                            <a href="{{ route('blog.show', $post->slug) }}" style="color: var(--color-primary); font-weight: 700; font-size: 0.9rem; text-decoration: none; line-height: 1.4; display: block; margin-bottom: 0.25rem;">
                                {{ $post->title }}
                            </a>
                            <span style="font-size: 0.75rem; color: var(--color-text-muted);">
                                {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Recent' }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Popular Tags Widget --}}
                @if(isset($tags) && $tags->count())
                <div class="card" style="background: #ffffff; border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: 1.75rem;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--color-primary); margin-bottom: 1.25rem; font-family: var(--font-heading); border-bottom: 2px solid var(--color-border); padding-bottom: 0.5rem;">
                        Topics &amp; Tags
                    </h3>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.4rem;">
                        @foreach($tags->take(15) as $tag)
                        <a href="{{ route('blog.tag', $tag->slug) }}" style="display: inline-block; background: var(--color-bg-alt); color: var(--color-text); font-size: 0.75rem; font-weight: 600; padding: 0.3rem 0.65rem; border-radius: var(--radius-full); text-decoration: none; border: 1px solid var(--color-border);">
                            {{ $tag->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </aside>
        </div>
    </div>
</section>
@endsection
