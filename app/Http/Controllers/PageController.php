<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Services\SeoService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        protected SeoService $seoService,
        protected BlogService $blogService
    ) {}

    public function about(): View
    {
        $seo = $this->seoService->forPage(
            title: 'About Adam L. Shapiro | NYC Personal Injury Attorney Since 1994',
            description: 'Attorney Adam L. Shapiro has been fighting for New York & Florida injury victims since 1994. Former defense attorney for Lloyd\'s of London and Harley Davidson — now exclusively on your side. Free consultation.'
        );

        return view('pages.about', compact('seo'));
    }

    public function services(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Personal Injury Practice Areas | NY Accident Lawyer | Shapiro',
            description: 'At Shapiro the Hero, we fight for injury victims across New York. Practice areas include car accidents, construction accidents, slip & fall, workers\' comp, medical malpractice, and wrongful death. Free consultation — no fee unless we win.'
        );

        return view('pages.services', compact('seo'));
    }

    public function personalInjury(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Personal Injury Lawyer NYC | Top-Rated Attorney | Shapiro',
            description: 'Shapiro the Hero | NY personal injury lawyer with 30+ years of wins. Car accidents, construction & malpractice. No fee unless we win.'
        );

        return view('pages.practice.personal-injury', compact('seo'));
    }

    public function motorVehicle(): View
    {
        $seo = $this->seoService->forPage(
            title: 'New York Car Accident Lawyer | Motor Vehicle Accidents | Shapiro',
            description: 'Injured in a New York car or motorcycle accident? Shapiro fights for maximum compensation. Free consultation. No fee unless he wins the case.'
        );

        return view('pages.practice.motor-vehicle', compact('seo'));
    }

    public function slipTripFall(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Slip & Fall Attorney New York | No Fee Unless We Win | Shapiro',
            description: 'Injured in a New York slip and fall? Shapiro fights landlords, businesses, and municipalities. Free consultation. No fee unless he wins.'
        );

        return view('pages.practice.slip-trip-fall', compact('seo'));
    }

    public function workersCompensation(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Workers\' Compensation Lawyer New York | Injured on the Job | Shapiro',
            description: 'Hurt at work in New York? Shapiro the Hero fights for full workers\' compensation benefits — medical care, lost wages, and disability coverage. Free consultation. No fee unless we win. Call (970) 742-7476.'
        );

        return view('pages.practice.workers-compensation', compact('seo'));
    }

    public function medicalMalpractice(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Medical Malpractice Attorney in New York | Shapiro',
            description: 'Medical negligence in New York? Shapiro the Hero sues for malpractice, misdiagnosis & birth injuries. Free consult. No fee unless we win.'
        );

        return view('pages.practice.medical-malpractice', compact('seo'));
    }

    public function wrongfulDeath(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Wrongful Death Attorney in New York | Need a Hero? Call Shapiro!',
            description: 'Wrongful death in New York? Shapiro the Hero recovers funeral costs, lost income & family support. Free consultation, no fee unless we win.'
        );

        return view('pages.practice.wrongful-death', compact('seo'));
    }

    public function constructionAccident(): View
    {
        $seo = $this->seoService->forPage(
            title: 'New York Construction Accident Lawyer | Labor Law 240 | Shapiro the Hero',
            description: 'Injured on a New York construction site? Shapiro the Hero handles Labor Law 240/241 scaffold falls, equipment injuries, and wrongful death claims. Free consultation — no fee unless we win. Call (970) 742-7476.'
        );

        return view('pages.practice.construction-accident', compact('seo'));
    }

    public function ebikeScooter(): View
    {
        $seo = $this->seoService->forPage(
            title: 'New York E-Bike & Scooter Accident Lawyer | Shapiro',
            description: 'E-bike or scooter accident in New York? Shapiro the Hero fights for delivery workers & crash victims. No fee unless we win.'
        );

        return view('pages.practice.ebike-scooter', compact('seo'));
    }

    public function highProfileCases(): View
    {
        $seo = $this->seoService->forPage(
            title: 'High Profile Cases | Landmark Litigation | Shapiro The Hero',
            description: 'High Profile Cases: Attorney Adam L. Shapiro has successfully litigated landmark, newsworthy cases against celebrities, major corporations, and municipal agencies.'
        );

        return view('pages.high-profiles-cases', compact('seo'));
    }

    public function awards(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Awards & Recognition | Need a Hero? Call Shapiro!',
            description: 'See the awards and recognition earned by Shapiro the Hero for dedication in New York personal injury law. Our achievements reflect results.'
        );

        return view('pages.awards', compact('seo'));
    }

    public function career(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Careers at Shapiro Law Office | Join Our Legal Team | Shapiro The Hero',
            description: 'Join our New York personal injury legal team in Forest Hills, Queens. Explore career opportunities for trial attorneys, paralegals, and legal staff.'
        );

        return view('pages.career', compact('seo'));
    }

    public function disclaimer(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Legal Disclaimer & Regulatory Disclosures | Shapiro The Hero',
            description: 'Important regulatory disclosures, attorney advertising notices, and legal representation guidelines from the Law Offices of Adam L. Shapiro & Associates.'
        );

        return view('pages.disclaimer', compact('seo'));
    }

    public function privacyPolicy(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Privacy Policy | Shapiro The Hero',
            description: 'Privacy Policy: Learn how Adam L. Shapiro & Associates protects your personal information and safeguards client confidentiality.'
        );

        return view('pages.privacy-policy', compact('seo'));
    }

    public function termsConditions(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Terms & Conditions | Shapiro The Hero',
            description: 'Terms and Conditions: Review the website terms of use and client communication policies for ShapiroTheHero.com.'
        );

        return view('pages.terms-conditions', compact('seo'));
    }

    public function attorneyAdvertising(): View
    {
        $seo = $this->seoService->forPage(
            title: 'Attorney Advertising | Shapiro The Hero',
            description: 'Attorney Advertising notice under the New York Rules of Professional Conduct for the Law Offices of Adam L. Shapiro & Associates, P.C.'
        );

        return view('pages.attorney-advertising', compact('seo'));
    }

    public function references(): View
    {
        $seo = $this->seoService->forPage(
            title: 'References & Recommendations | Shapiro The Hero',
            description: 'Read client reviews, endorsements, and recommendations for Attorney Adam L. Shapiro from over 30 years of personal injury representation in New York.'
        );

        return view('pages.references-recommendations', compact('seo'));
    }
}
