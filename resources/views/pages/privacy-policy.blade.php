@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
<section class="page-hero">
    <div class="container">
        <div style="max-width:850px;margin:0 auto;text-align:center;">
            <span class="badge badge-navy" style="margin-bottom:1rem;">Data Privacy &amp; Client Confidentiality</span>
            <h1 class="page-hero-title" style="color:#ffffff;margin-top:0.5rem;margin-bottom:1.25rem;">Privacy Policy</h1>
            <p class="page-hero-sub">
                Your privacy and legal confidentiality are of paramount importance to the Law Offices of Adam L. Shapiro &amp; Associates, P.C.
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
                        Our Policy &bull; Commitment to Your Privacy
                    </h2>
                    <p style="color:var(--color-gray-700);line-height:1.8;font-size:1.05rem;">
                        The Law Offices of Adam L. Shapiro &amp; Associates focuses on Accident and Injury claims, <a href="{{ route('practice.workers-compensation') }}" style="color:var(--color-navy);font-weight:700;">Workers’ Compensation Matters</a>, Social Security Disability Claims, along with other General Civil Litigation. Adam L. Shapiro and his staff take great pride in representing individuals and their families when tragedy strikes. If you are hurt in an accident due to the negligence of another person, property owner, company, municipality, institution or other entity you need a knowledgeable and aggressive attorney. His firm provides prompt answers to your questions, a quick presentation of your claim and a personal touch often lacking with other law firms. All client phone calls are always promptly returned. Mr. Shapiro is reachable and accessible.
                    </p>
                </div>

                <div style="margin-bottom:2.5rem;">
                    <h2 style="font-size:1.6rem;font-weight:800;color:var(--color-navy);margin-bottom:1rem;">
                        Why Use Privacy Policy &bull; How We Protect You
                    </h2>
                    <p style="color:var(--color-gray-700);line-height:1.8;font-size:1.05rem;">
                        You will never be treated like just another file number. All claims and suits are handled expeditiously. Time is of the essence, especially when it comes to payment of your lost wages and medical bills. Experience matters, and, since 1994, Attorney Adam L. Shapiro has been helping New York &amp; Florida injury victims recover money for injuries, wrongful death, wage losses, medical expenses and other damages resulting from accidents involving Cars, Trucks, Buses, Motorcycles, Boats, Bicycle, Motorized Scooters, Private and Public Property Owners, Defective Products &amp; Toys, Medical Malpractice and many other types of Serious Injury Claims.
                    </p>
                </div>

                <div style="margin-bottom:2.5rem;">
                    <h2 style="font-size:1.6rem;font-weight:800;color:var(--color-navy);margin-bottom:1rem;">
                        The Defense Insider Advantage
                    </h2>
                    <p style="color:var(--color-gray-700);line-height:1.8;font-size:1.05rem;">
                        Mr. Shapiro also has extensive experience working as a defense attorney for such institutional clients as Lloyd's of London, Harley Davidson, Ford Motor Credit, Bank of America, Legion Insurance Company, The New York State Liquidation Bureau, National Alliance Brokerage Services and New York Rent-A-Car. Such experience gives his practice an edge. Having defended such high-profile clients and their insureds enables him to anticipate the strategy of his adversaries when prosecuting your claim against them.
                    </p>
                </div>

                <div style="margin-bottom:2.5rem;">
                    <h2 style="font-size:1.6rem;font-weight:800;color:var(--color-navy);margin-bottom:1rem;">
                        Information Collection &amp; Use
                    </h2>
                    <p style="color:var(--color-gray-700);line-height:1.8;font-size:1.05rem;">
                        When you submit a consultation request or communicate with our firm via email, telephone, or online forms, we collect information such as your name, telephone number, email address, and factual notes regarding your legal inquiry. This information is used strictly to evaluate your potential claims, contact you regarding legal representation, and provide legal counsel. We never sell, rent, trade, or share your personal information with third parties for commercial or marketing purposes.
                    </p>
                </div>

                <div style="border-top:1px solid var(--color-gray-300);padding-top:1.5rem;font-size:0.95rem;color:var(--color-gray-500);">
                    If you have questions regarding this Privacy Policy or wish to review information submitted to our office, please contact us at <a href="mailto:adam@shapirolawoffice.com" style="color:var(--color-red);font-weight:600;">adam@shapirolawoffice.com</a> or call <a href="tel:+19707427476" style="color:var(--color-navy);font-weight:600;">(970) 742-7476</a>.
                </div>

            </div>
        </div>
    </section>

    {{-- Awards & Recognition Ribbon --}}
    @include('partials.awards-ribbon')
@endsection
