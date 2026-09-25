@if(isset($seo))
    <title>{{ $seo['title'] ?? 'Adam L. Shapiro & Associates, P.C. – Personal Injury & Motorcycle Accident Lawyers in Queens & Forest Hills NYC' }}</title>
    @if(!empty($seo['description']))
    <meta name="description" content="{{ $seo['description'] }}">
    @endif
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="{{ $seo['og_type'] ?? 'website' }}">
    <meta property="og:title" content="{{ $seo['og_title'] ?? ($seo['title'] ?? '') }}">
    @if(!empty($seo['og_description']))
    <meta property="og:description" content="{{ $seo['og_description'] }}">
    @endif
    <meta property="og:url" content="{{ $seo['og_url'] ?? ($seo['canonical'] ?? url()->current()) }}">
    <meta property="og:site_name" content="{{ $seo['og_site_name'] ?? 'Adam L. Shapiro & Associates, P.C. – Personal Injury & Motorcycle Accident Lawyers in Queens & Forest Hills NYC' }}">
    <meta property="og:image" content="{{ $seo['og_image'] ?? asset('/assets/media/branding/shapiro-logo.png') }}">
    @if(isset($seo['article_published_time']))
    <meta property="article:published_time" content="{{ $seo['article_published_time'] }}">
    @endif

    {{-- Twitter --}}
    <meta name="twitter:card" content="{{ $seo['twitter_card'] ?? 'summary_large_image' }}">
    <meta name="twitter:title" content="{{ $seo['og_title'] ?? ($seo['title'] ?? '') }}">
    @if(!empty($seo['og_description']))
    <meta name="twitter:description" content="{{ $seo['og_description'] }}">
    @endif
    <meta name="twitter:image" content="{{ $seo['og_image'] ?? asset('/assets/media/branding/shapiro-logo.png') }}">

    {{-- JSON-LD Structured Data Schema --}}
    @if(!empty($seo['schema_json']))
    <script type="application/ld+json">
    {!! $seo['schema_json'] !!}
    </script>
    @endif
@else
    <title>Adam L. Shapiro & Associates, P.C. - Shapiro The Hero</title>
    <meta name="description" content="Personal Injury Lawyers in New York. No fee unless we win. Free consultation.">
    <link rel="canonical" href="{{ url()->current() }}">
@endif
