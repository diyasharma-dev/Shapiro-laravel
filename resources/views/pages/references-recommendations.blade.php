@extends('layouts.app')

@section('body_class', 'references-page')

@section('content')

{{-- =========================================================================
     1. HERO SECTION
     ========================================================================= --}}
<section style="position: relative; overflow: hidden; background: #0b1b3d;">
    <div style="width: 100%; max-height: 480px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
        <img src="{{ asset('assets/media/branding/life-changes-banner.png') }}" alt="When Life Changes - Shapiro The Hero Law Office" style="width: 100%; height: auto; object-fit: cover;" fetchpriority="high">
    </div>
</section>

{{-- =========================================================================
     2. REFERENCES & RECOMMENDATIONS INTRO & LIST
     ========================================================================= --}}
<section class="section" style="background: var(--color-bg); padding: 4rem 0;">
    <div class="container" style="max-width: 960px;">
        <div style="text-align: center; margin-bottom: 3.5rem;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(30, 58, 138, 0.08); border: 1px solid rgba(30, 58, 138, 0.2); padding: 0.4rem 1.25rem; border-radius: var(--radius-full); margin-bottom: 1.25rem;">
                <span style="font-size: 0.8125rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-primary);">Verified Client Endorsements</span>
            </div>

            <h1 class="heading-xl" style="color: var(--color-primary); margin-bottom: 1.5rem;">
                References &amp; <span style="color: var(--color-accent-blue, #1e3a8a);">Recommendations</span>
            </h1>

            <div style="margin: 0 auto 1.5rem; display: flex; justify-content: center;">
                <img src="{{ asset('assets/media/branding/linkedin-badge.jpg') }}" alt="LinkedIn Recommendation Badge" style="max-width: 260px; height: auto; border-radius: 8px; box-shadow: var(--shadow-sm);">
            </div>

            <p style="font-size: 1.15rem; line-height: 1.8; color: var(--color-text-muted); max-width: 800px; margin: 0 auto;">
                Read direct references and recommendations from clients, colleagues, and families represented by Attorney Adam L. Shapiro across over 30 years of personal injury advocacy in New York and Florida.
            </p>
        </div>

        @php
            $testimonials = [
                [
                    'name' => 'Philip',
                    'date' => 'April 15, 2016',
                    'text' => 'I have used Mr. Shapiro multiple times and found his professionalism and attention to details to be excellent. His follow-up and result-oriented approach is excellent. I have also recommended his services to many of my clients and friends and NEVER received any complaints.'
                ],
                [
                    'name' => 'Client',
                    'date' => 'April 13, 2016',
                    'text' => 'Mr. Shapiro is an excellent attorney. My wife and I were very pleased with his representation. He is hard working, hands on and very professional. He was always available to answer questions and discuss our case. We would highly recommend him.'
                ],
                [
                    'name' => 'John',
                    'date' => 'April 13, 2016',
                    'text' => 'I have hired Adam Shapiro on several occasions and found both him and his team to be the epitome of professionalism. No less were the results of my lawsuits favorable, they were administered with the least amount of disruption to my personal life. I would certainly use this law firm again and would recommend them to others as well.'
                ],
                [
                    'name' => 'Paul',
                    'date' => 'April 13, 2016',
                    'text' => 'Very happy with his legal work.'
                ],
                [
                    'name' => 'Donna',
                    'date' => 'April 13, 2016',
                    'text' => 'Adam has helped me secure payments when I had an accident or two. He is diligent and always gets me a good outcome.'
                ],
                [
                    'name' => 'Peter',
                    'date' => 'April 6, 2016',
                    'text' => 'Great to consult with. Positive, professional and productive.'
                ],
                [
                    'name' => 'Eric',
                    'date' => 'April 6, 2016',
                    'text' => 'Adam is a top notch attorney. He represented me in a legal matter and not only did a great job with the actual work, but was patient and able to explain the process and what was going on in simple (non-legalese) terms that were easy to understand. I would absolutely recommend him.'
                ],
                [
                    'name' => 'Client',
                    'date' => 'April 6, 2016',
                    'text' => 'Mr. Shapiro\'s firm helped me and my family at a very difficult time when I was injured. His guidance and advice helped me to get a very good settlement.'
                ],
                [
                    'name' => 'Renee',
                    'date' => 'April 6, 2016',
                    'text' => 'Mr. Adam Shapiro represented my family with great results. We were more than happy with the outcome. Mr. Shapiro, along with his knowledgeable staff, made a hard time – less stressful. What more can you ask for?'
                ],
                [
                    'name' => 'Steve Simon',
                    'date' => 'Nov. 10, 2011',
                    'text' => 'I’ve known Adam for a few years now and I can highly recommend him. Adam has provided assistance to me in my various leadership roles in non-profit organizations. I have found his integrity, expertise, attention to detail and genuine care for others to be the hallmarks of Adam’s personal and professional commitment to excellence.'
                ],
                [
                    'name' => 'William Kreit',
                    'date' => 'Jan. 21, 2010',
                    'text' => 'I have known Adam for many years, as both a friend and attorney. His knowledge, honesty and compassion are what set him apart. Adam is a man of integrity and his concern for his clients, along with his attention to detail make him a fantastic attorney.'
                ],
                [
                    'name' => 'Michael Feld',
                    'date' => 'Jan. 22, 2010',
                    'text' => 'I would highly recommend Adam Shapiro to represent you with any legal matters. He has represented myself and family over the years with several issues. He has the experience and knowledge required to win your case and secure a positive outcome.'
                ],
                [
                    'name' => 'Philip Jacoby',
                    'date' => 'Apr. 16, 2010',
                    'text' => 'I have hired Adam as an attorney and his work is impeccable. His case management skills are great and his follow up is also. We won our cases we worked on, he is great!!!'
                ],
                [
                    'name' => 'Russ Panzer',
                    'date' => 'Jan. 21, 2010',
                    'text' => 'Adam has done some legal work for our company. He is knowledgeable in the areas that we needed, and walked us through the legal procedures that we requested. I would use Adam again, and recommend him to others.'
                ],
            ];
        @endphp

        <div style="display: flex; flex-direction: column; gap: 1.75rem;">
            @foreach($testimonials as $item)
            <div class="card" style="background: #ffffff; border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: 2rem 2.25rem; box-shadow: var(--shadow-sm); transition: transform 0.2s ease, box-shadow 0.2s ease;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
                    <div>
                        <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--color-primary); margin: 0; font-family: var(--font-heading);">
                            {{ $item['name'] }}
                        </h2>
                        <span style="font-size: 0.8125rem; font-weight: 600; color: var(--color-text-muted);">
                            {{ $item['date'] }}
                        </span>
                    </div>
                    <div style="display: flex; gap: 0.2rem; color: #f59e0b;">
                        ★★★★★
                    </div>
                </div>
                <p style="font-size: 1.05rem; line-height: 1.75; color: var(--color-gray-700, #334155); margin: 0;">
                    &ldquo;{{ $item['text'] }}&rdquo;
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- =========================================================================
     3. CONSULTATION / CASE EVALUATION FORM
     ========================================================================= --}}
<section class="section section-alt" id="consultation" style="background: #ffffff; border-top: 1px solid var(--color-border);">
    <div class="container">
        <div class="responsive-two-col">
            <div>
                <span class="section-subtitle">Secure Your Consultation</span>
                <h2 class="heading-lg" style="margin-bottom: 1.25rem;">
                    Experience The Shapiro Difference
                </h2>
                <p style="font-size: 1.0625rem; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 1.5rem;">
                    When you are injured due to someone else's negligence in New York, you need an aggressive, experienced trial attorney on your side. No fee unless we win.
                </p>
                <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(220, 38, 38, 0.15); color: #16a34a; flex-shrink: 0; font-weight: 800;">✓</span>
                        <span style="font-size: 0.95rem; color: var(--color-text);"><strong>Over 30 Years Experience:</strong> Dedicated injury advocate since 1994.</span>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(220, 38, 38, 0.15); color: var(--color-accent-red); flex-shrink: 0; font-weight: 800;">✓</span>
                        <span style="font-size: 0.95rem; color: var(--color-text);"><strong>Direct Personal Attention:</strong> Work directly with Attorney Shapiro.</span>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(22, 163, 74, 0.15); color: #16a34a; flex-shrink: 0; font-weight: 800;">✓</span>
                        <span style="font-size: 0.95rem; color: var(--color-text);"><strong>No Recovery, No Fee:</strong> Zero out-of-pocket costs for you.</span>
                    </div>
                </div>

                <div style="background: var(--color-bg-alt); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: 1.5rem; display: flex; align-items: center; gap: 1.25rem;">
                    <div style="width: 52px; height: 52px; border-radius: 50%; background: rgba(220, 38, 38, 0.1); color: var(--color-accent-red); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <div>
                        <div style="font-size: 0.8125rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase;">24/7 Rapid Response Line</div>
                        <a href="tel:+19707427476" style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary); font-family: var(--font-heading); text-decoration: none;">(970) SHAPIRO</a>
                    </div>
                </div>
            </div>

            <div>
                <div class="card" style="background: #ffffff; border: 2px solid var(--color-border); border-radius: var(--radius-xl); padding: 2.25rem 1.75rem; box-shadow: var(--shadow-lg);">
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary); margin-bottom: 0.5rem; font-family: var(--font-heading);">Book A Free Consultation</h3>
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
