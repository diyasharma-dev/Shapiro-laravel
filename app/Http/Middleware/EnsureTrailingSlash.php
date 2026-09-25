<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use Symfony\Component\HttpFoundation\Response;

class EnsureTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only inspect safe GET and HEAD requests
        if (! in_array($request->method(), ['GET', 'HEAD'], true)) {
            return $next($request);
        }

        $path = $request->getPathInfo();

        // If root path or already ends with slash, proceed
        if ($path === '/' || str_ends_with($path, '/')) {
            return $next($request);
        }

        // Exclude paths with file extensions (e.g. .xml, .txt, .css, .js, images)
        if (preg_match('/\.[a-zA-Z0-9]{1,5}$/', $path)) {
            return $next($request);
        }

        // Exclude internal healthcheck
        if ($path === '/up') {
            return $next($request);
        }

        // If the route itself is an explicit redirect route (e.g. Route::redirect), let it execute
        $route = $request->route();
        if ($route && $route->getController() instanceof RedirectController) {
            return $next($request);
        }

        $queryString = $request->getQueryString();
        $target = $request->getSchemeAndHttpHost().$path.'/'.($queryString ? '?'.$queryString : '');

        return redirect($target, 301);
    }
}
