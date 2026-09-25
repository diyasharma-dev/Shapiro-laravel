<?php

namespace App\Providers;

use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Eloquent\PostRepository;
use App\Routing\TrailingSlashUrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );

        $this->app->extend('url', function ($url, $app) {
            $routes = $app['router']->getRoutes();
            $request = $app->bound('request')
                ? $app->rebinding('request', function ($app, $request) {
                    $app['url']->setRequest($request);
                })
                : Request::create('/');

            $customUrl = new TrailingSlashUrlGenerator(
                $routes,
                $request,
                $app['config']['app.asset_url']
            );

            $customUrl->setSessionResolver(function () use ($app) {
                return $app['session'] ?? null;
            });

            $customUrl->setKeyResolver(function () use ($app) {
                return $app->make('config')->get('app.key');
            });

            return $customUrl;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
