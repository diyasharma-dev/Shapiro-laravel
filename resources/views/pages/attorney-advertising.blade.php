@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
<section class="page-hero">
    <div class="container">
        <div style="max-width:850px;margin:0 auto;text-align:center;">
            <span class="badge badge-navy" style="margin-bottom:1rem;">Statutory Regulatory Notice</span>
            <h1 class="page-hero-title" style="color:#ffffff;margin-top:0.5rem;margin-bottom:1.25rem;">Attorney Advertising</h1>
            <p class="page-hero-sub">
                This website may constitute attorney advertising under the rules of the New York State Unified Court System and other applicable legal jurisdictions.
            </p>
        </div>
    </div>
</section>

    {{-- Content Section --}}
    <section class="section" style="background:var(--color-white);">
        <div class="container">
            <div class="card" style="max-width:960px;margin:0 auto;padding:3rem;background:var(--color-gray-50);border:1px solid var(--color-gray-200);">
                
                <div style="margin-bottom:2.5rem;">
                    <h2 style="font-size:1.6rem;font-weight:800;color:var(--color-navy);margin-bottom:1rem;">
                        Attorney Advertising Notice
                    </h2>
                    <p style="color:var(--color-gray-700);line-height:1.8;font-size:1.05rem;">
                        The information on this site is not intended to and does not offer legal advice, legal recommendations or legal representation on any matter. Hiring an attorney is an important decision, which should not be based on advertising. You need to consult an attorney in person for legal advice regarding your individual situation.
                    </p>
                </div>

                <div style="margin-bottom:2.5rem;">
                    <h2 style="font-size:1.6rem;font-weight:800;color:var(--color-navy);margin-bottom:1rem;">
                        No Attorney-Client Privilege Until Retained
                    </h2>
                    <p style="color:var(--color-gray-700);line-height:1.8;font-size:1.05rem;">
                        Please be aware that, while we invite you to contact us and welcome your calls, letters and electronic mail, contacting us does not create an attorney-client relationship. An attorney-client relationship will only be created if and when we enter into a written agreement with respect to legal representation. Please do not send any sensitive or confidential information to us by email or otherwise until such time as an attorney-client relationship has been established in writing and, even then, such information should only be sent in a safe and secure manner.
                    </p>
                </div>

                <div style="margin-bottom:2.5rem;">
                    <h2 style="font-size:1.6rem;font-weight:800;color:var(--color-navy);margin-bottom:1rem;">
                        Jurisdiction &amp; Practice Information
                    </h2>
                    <p style="color:var(--color-gray-700);line-height:1.8;font-size:1.05rem;">
                        <a href="{{ route('home') }}" style="color:var(--color-navy);font-weight:700;text-decoration:none;">Adam L. Shapiro</a>, a law firm located in New York City, New York, has as its mission the advancement and protection of the rights of the individual in cases involving employment, civil rights, criminal defense and general litigation. The firm handles cases throughout the five boroughs of NYC, as well as Nassau, Suffolk, Westchester, Dutchess and Rockland Counties. In addition to its work in New York, the firm has extensive knowledge and experience in the representation of federal employees in all criminal and employment-related matters and represents federal employees throughout the Northeastern United States.
                    </p>
                </div>

                <div style="border-top:1px solid var(--color-gray-300);padding-top:1.5rem;font-size:0.95rem;color:var(--color-gray-500);">
                    Prior results do not guarantee a similar outcome. Principal office: 70-20 Austin St Ste 111, Forest Hills, NY 11375. Telephone: <a href="tel:+19707427476" style="color:var(--color-navy);font-weight:600;">(970) 742-7476</a>.
                </div>

            </div>
        </div>
    </section>
@endsection
