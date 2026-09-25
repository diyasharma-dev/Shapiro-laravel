@extends('layouts.app')

@section('body_class', 'awards-page')

@section('content')

{{-- =========================================================================
     1. HERO SECTION
     ========================================================================= --}}
<section class="hero-section">
    <div class="container">
        <div style="max-width: 840px; margin: 0 auto; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(217, 119, 6, 0.15); border: 1px solid rgba(217, 119, 6, 0.4); padding: 0.4rem 1.25rem; border-radius: var(--radius-full); margin-bottom: 1.5rem;">
                <span style="font-size: 0.8125rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #fcd34d;">Distinguished Courtroom Honors</span>
            </div>

            <h1 class="heading-xl" style="color: #ffffff; margin-bottom: 1.5rem;">
                Tactical Excellence &amp; <span style="color: var(--color-accent-light);">Accolades</span>
            </h1>

            <p style="font-size: 1.125rem; line-height: 1.8; color: #cbd5e1; margin-bottom: 2.25rem;">
                A reputation backed by national recognition, peer distinction, and over 30 years of relentless courtroom advocacy for injured New Yorkers and their families.
            </p>

            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="#awards-grid" class="btn btn-accent btn-lg">
                    <span>View Honors &amp; Distinctions</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14m-7-7 7 7 7-7"/></svg>
                </a>
                <a href="#consultation" class="btn btn-outline-white btn-lg">
                    <span>Free Case Evaluation</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- =========================================================================
     2. AWARDS & ACCOLADES GRID
     ========================================================================= --}}
<section class="section" id="awards-grid" style="background: var(--color-bg);">
    <div class="container">
        <div class="section-header" style="text-align: center; max-width: 780px; margin: 0 auto 3.5rem;">
            <span class="section-subtitle">Verified Recognition</span>
            <h2 class="heading-lg">Award-Winning Legal Representation You Can Trust</h2>
            <p style="color: var(--color-text-muted); font-size: 1.0625rem; line-height: 1.7;">
                Attorney Adam L. Shapiro has earned consistent peer recognition and client distinction across New York and nationwide.
            </p>
        </div>

        @php
            $awardsList = [
                [
                    'img' => 'assets/media/awards/10-best-attorneys-2018.png',
                    'title' => '10 Best 2018',
                    'org' => 'American Institute of Personal Injury Attorneys',
                    'desc' => 'Honored for exceptional client satisfaction and outstanding legal results in personal injury law.'
                ],
                [
                    'img' => 'assets/media/awards/20th-anniversary-excellence.png',
                    'title' => '20th Anniversary',
                    'org' => 'Decades of Legal Distinction',
                    'desc' => 'Commemorating two decades of dedicated trial advocacy defending the rights of injury victims.'
                ],
                [
                    'img' => 'assets/media/awards/25-years-experience-silver.png',
                    'title' => '25 Years Experience',
                    'org' => 'Silver Anniversary Courtroom Service',
                    'desc' => 'Recognizing a quarter-century of relentless courtroom litigation across New York and Florida courts.'
                ],
                [
                    'img' => 'assets/media/awards/american-academy-attorneys.png',
                    'title' => 'American Academy',
                    'org' => 'American Academy of Attorneys',
                    'desc' => 'Selected among the top legal practitioners demonstrating unwavering ethical and professional standards.'
                ],
                [
                    'img' => 'assets/media/awards/american-association-for-justice.png',
                    'title' => 'Association of Justice',
                    'org' => 'American Association for Justice (AAJ)',
                    'desc' => 'Active membership in the nation\'s premier trial lawyer organization dedicated to civil justice.'
                ],
                [
                    'img' => 'assets/media/awards/avvo-clients-choice.png',
                    'title' => 'AVVO Client\'s Choice',
                    'org' => 'Avvo Legal Rating Service',
                    'desc' => 'Awarded based on stellar client reviews, 5-star feedback, and proven dedication to accident victims.'
                ],
                [
                    'img' => 'assets/media/awards/best-attorneys-of-america.png',
                    'title' => 'Best Attorneys of America',
                    'org' => 'Rue Ratings Lifetime Member',
                    'desc' => 'Reserved for less than 1% of attorneys in America who demonstrate exceptional legal prowess.'
                ],
                [
                    'img' => 'assets/media/awards/best-lawyers-award.png',
                    'title' => 'Best Lawyers',
                    'org' => 'Peer-Reviewed Legal Distinction',
                    'desc' => 'Recognized through rigorous peer evaluation as one of the most competent advocates in the profession.'
                ],
                [
                    'img' => 'assets/media/awards/businessman-of-the-year.png',
                    'title' => 'Businessman of the Year',
                    'org' => 'National Leadership Award',
                    'desc' => 'Presented in recognition of outstanding business ethics, leadership, and community service.'
                ],
                [
                    'img' => 'assets/media/awards/top-100-trial-lawyers.png',
                    'title' => 'Top 100 Attorneys',
                    'org' => 'The National Trial Lawyers',
                    'desc' => 'Invitation-only membership comprised of the premier trial lawyers from each state or region.'
                ],
                [
                    'img' => 'assets/media/awards/top-tier-lawyers.png',
                    'title' => 'Top Tier Attorneys',
                    'org' => 'Top Tier Lawyers Registry',
                    'desc' => 'Honored for exceptional legal competence, trial preparation, and consistent substantial recoveries.'
                ],
                [
                    'img' => 'assets/media/awards/global-law-experts.png',
                    'title' => 'Global Law Experts',
                    'org' => 'Recommended Law Firm',
                    'desc' => 'International endorsement recognizing top-tier personal injury dispute resolution in New York.'
                ],
                [
                    'img' => 'assets/media/awards/lawyers-of-distinction.png',
                    'title' => 'Lawyers of Distinction',
                    'org' => 'Recognizing Excellence in Law',
                    'desc' => 'Selected through an objective vetting process based on case results and legal reputation.'
                ],
                [
                    'img' => 'assets/media/awards/national-alliance-of-attorneys.png',
                    'title' => 'National Alliance',
                    'org' => 'National Alliance of Attorneys',
                    'desc' => 'Recognized for distinguished legal advocacy and aggressive representation for the injured.'
                ],
            ];
        @endphp

        <div class="awards-grid-responsive">
            @foreach($awardsList as $item)
                <div class="award-badge-card">
                    <div class="award-badge-card-content">
                        <div class="award-badge-img-wrapper">
                            <img src="{{ asset($item['img']) }}" alt="{{ $item['title'] }}" loading="lazy">
                        </div>
                        <h3 class="award-badge-title">{{ $item['title'] }}</h3>
                        <div class="award-badge-org">{{ $item['org'] }}</div>
                        <p class="award-badge-desc">{{ $item['desc'] }}</p>
                    </div>
                    <div class="award-badge-footer">
                        <span class="award-badge-verified">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            Verified Credential
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- =========================================================================
     3. CONSULTATION / CASE EVALUATION FORM
     ========================================================================= --}}
<section class="section section-alt" id="consultation">
    <div class="container">
        <div class="responsive-two-col">
            <div>
                <span class="section-subtitle">Secure Your Consultation</span>
                <h2 class="heading-lg" style="margin-bottom: 1.25rem;">
                    Get Your Free Case Evaluation
                </h2>
                <p style="font-size: 1.0625rem; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 1.5rem;">
                    If you or a loved one was hurt in New York, time is critical. Evidence disappears, and statutory filing deadlines (including the strict 90-day municipal claim limit) run quickly.
                </p>
                <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(22, 163, 74, 0.15); color: #16a34a; flex-shrink: 0; font-weight: 800;">✓</span>
                        <span style="font-size: 0.95rem; color: var(--color-text);"><strong>100% Free &amp; Confidential:</strong> You pay nothing upfront, ever.</span>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(220, 38, 38, 0.15); color: var(--color-accent-red); flex-shrink: 0; font-weight: 800;">✓</span>
                        <span style="font-size: 0.95rem; color: var(--color-text);"><strong>Direct Attorney Access:</strong> Speak directly with Adam L. Shapiro.</span>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(22, 163, 74, 0.15); color: #16a34a; flex-shrink: 0; font-weight: 800;">✓</span>
                        <span style="font-size: 0.95rem; color: var(--color-text);"><strong>No Fee Unless We Win:</strong> We recover your funds before any fee is paid.</span>
                    </div>
                </div>

                <div style="background: #ffffff; border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: 1.5rem; display: flex; align-items: center; gap: 1.25rem;">
                    <div style="width: 52px; height: 52px; border-radius: 50%; background: rgba(220, 38, 38, 0.1); color: var(--color-accent-red); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <div>
                        <div style="font-size: 0.8125rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase;">24/7 Rapid Response Hotline</div>
                        <a href="tel:+19707427476" style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary); font-family: var(--font-heading); text-decoration: none;">(970) SHAPIRO</a>
                    </div>
                </div>
            </div>

            <div>
                <div class="card" style="background: #ffffff; border: 2px solid var(--color-border); border-radius: var(--radius-xl); padding: 2.5rem; box-shadow: var(--shadow-lg);">
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary); margin-bottom: 0.5rem; font-family: var(--font-heading);">Book A Consultation</h3>
                    <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: 1.75rem;">Fill out the form below. An attorney will respond immediately.</p>

                    @if(session('success'))
                        <div style="background: #dcfce7; border: 1px solid #86efac; color: #166534; padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1.5rem; font-size: 0.875rem;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                            <div>
                                <label for="name" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--color-text); margin-bottom: 0.35rem;">Full Name *</label>
                                <input type="text" id="name" name="name" required placeholder="Your full name" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-size: 0.95rem;">
                            </div>

                            <div class="form-row-two-col">
                                <div>
                                    <label for="phone" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--color-text); margin-bottom: 0.35rem;">Phone Number *</label>
                                    <input type="tel" id="phone" name="phone" required placeholder="(970) 000-0000" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-size: 0.95rem;">
                                </div>
                                <div>
                                    <label for="email" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--color-text); margin-bottom: 0.35rem;">Email Address *</label>
                                    <input type="email" id="email" name="email" required placeholder="you@example.com" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-size: 0.95rem;">
                                </div>
                            </div>

                            <div>
                                <label for="case_type" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--color-text); margin-bottom: 0.35rem;">Type of Accident / Case *</label>
                                <select id="case_type" name="case_type" required style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-size: 0.95rem; background: #ffffff;">
                                    <option value="" disabled selected>Select case type...</option>
                                    <option value="Car / Motor Vehicle Accident">Car / Motor Vehicle Accident</option>
                                    <option value="Slip, Trip & Fall">Slip, Trip & Fall</option>
                                    <option value="Construction Site Accident">Construction Site Accident</option>
                                    <option value="Workers' Compensation">Workers' Compensation</option>
                                    <option value="Medical Malpractice">Medical Malpractice</option>
                                    <option value="E-Bike / Scooter Accident">E-Bike / Scooter Accident</option>
                                    <option value="Wrongful Death">Wrongful Death</option>
                                    <option value="Other Injury">Other Personal Injury</option>
                                </select>
                            </div>

                            <div>
                                <label for="message" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--color-text); margin-bottom: 0.35rem;">Case Brief Details *</label>
                                <textarea id="message" name="message" rows="4" required placeholder="Tell us what happened, date of accident, and injuries sustained..." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-size: 0.95rem; resize: vertical;"></textarea>
                            </div>

                            <button type="submit" class="btn btn-accent btn-lg" style="width: 100%; justify-content: center; box-shadow: 0 8px 20px rgba(220, 38, 38, 0.35);">
                                <span>Submit For Free Review</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
