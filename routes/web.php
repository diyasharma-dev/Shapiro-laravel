<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Shapiro The Hero
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Main Pages
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/high-profiles-cases', [PageController::class, 'highProfileCases'])->name('high-profiles-cases');
Route::get('/awards', [PageController::class, 'awards'])->name('awards');
Route::get('/career', [PageController::class, 'career'])->name('career');
Route::get('/references-recommendations', [PageController::class, 'references'])->name('references');

// Practice Areas
Route::prefix('/')->group(function () {
    Route::get('/personal-injury-lawyer-new-york', [PageController::class, 'personalInjury'])->name('practice.personal-injury');
    Route::get('/any-motor-vehicle', [PageController::class, 'motorVehicle'])->name('practice.motor-vehicle');
    Route::get('/slip-trip-fall', [PageController::class, 'slipTripFall'])->name('practice.slip-trip-fall');
    Route::get('/workers-compensation', [PageController::class, 'workersCompensation'])->name('practice.workers-compensation');
    Route::get('/medical-malpractice', [PageController::class, 'medicalMalpractice'])->name('practice.medical-malpractice');
    Route::get('/wrongful-death', [PageController::class, 'wrongfulDeath'])->name('practice.wrongful-death');
    Route::get('/construction-accident', [PageController::class, 'constructionAccident'])->name('practice.construction-accident');
    Route::get('/electrical-bicycle-scooter', [PageController::class, 'ebikeScooter'])->name('practice.ebike-scooter');
});

// Dynamic Blog Routes
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/page/{page}', [BlogController::class, 'index'])->whereNumber('page')->name('index.page');
    Route::get('/tag/{slug}', [BlogController::class, 'byTag'])->name('tag');
    Route::get('/tag/{slug}/page/{page}', [BlogController::class, 'byTag'])->whereNumber('page')->name('tag.page');
    Route::get('/service/{slug}', [BlogController::class, 'service'])->name('service');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

// Contact Form
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'submit'])->name('contact.submit');

// Legal & Compliance
Route::get('/disclaimer', [PageController::class, 'disclaimer'])->name('disclaimer');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-conditions', [PageController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/attorney-advertising', [PageController::class, 'attorneyAdvertising'])->name('attorney-advertising');

// 301 SEO Redirects for URL Aliases
Route::redirect('/practice-areas', '/services/', 301);
Route::redirect('/practice-areas/personal-injury-lawyer', '/personal-injury-lawyer-new-york/', 301);
Route::redirect('/practice-areas/motor-vehicle-accident-lawyer', '/any-motor-vehicle/', 301);
Route::redirect('/practice-areas/slip-and-fall-attorney', '/slip-trip-fall/', 301);
Route::redirect('/practice-areas/workers-compensation-lawyer', '/workers-compensation/', 301);
Route::redirect('/practice-areas/medical-malpractice-attorney', '/medical-malpractice/', 301);
Route::redirect('/practice-areas/wrongful-death-lawyer', '/wrongful-death/', 301);
Route::redirect('/practice-areas/construction-accident-attorney', '/construction-accident/', 301);
Route::redirect('/practice-areas/electrical-bicycle-and-scooter-accident-lawyer', '/electrical-bicycle-scooter/', 301);
Route::redirect('/terms-and-conditions', '/terms-conditions/', 301);

// Dynamic Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Backward-compatibility for legacy asset URLs
Route::get('/wp-content/{path}', function (string $path) {
    if (str_contains($path, 'shapiro-logo')) {
        return redirect('/assets/media/branding/shapiro-logo.png', 301);
    }

    $target = public_path('assets/'.$path);
    if (file_exists($target) && is_file($target)) {
        return response()->file($target);
    }

    return redirect('/', 301);
})->where('path', '.*');

Route::get('/wp-includes/{path}', function (string $path) {
    return redirect('/', 301);
})->where('path', '.*');

Route::get('/assets/uploads/{path}', function (string $path) {
    if (str_contains($path, 'shapiro-logo')) {
        return redirect('/assets/media/branding/shapiro-logo.png', 301);
    }

    return redirect('/', 301);
})->where('path', '.*');
