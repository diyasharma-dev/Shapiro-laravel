<?php

namespace App\Routing;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Routing\UrlGenerator;

class TrailingSlashUrlGenerator extends UrlGenerator
{
    /**
     * Create a new URL Generator instance.
     */
    public function __construct(
        RouteCollectionInterface $routes,
        ?Request $request = null,
        ?string $assetRoot = null
    ) {
        $request = $request ?: Request::create('/');
        parent::__construct($routes, $request, $assetRoot);
    }

    /**
     * Format the given URL segments into a single URL.
     *
     * @param  string  $root
     * @param  string  $path
     * @param  Route|null  $route
     */
    public function format($root, $path, $route = null): string
    {
        $url = parent::format($root, $path, $route);

        $pathOnly = parse_url($url, PHP_URL_PATH) ?? '';

        // If the path has a file extension (e.g. .xml, .txt, .json), do not append trailing slash
        if (preg_match('/\.[a-zA-Z0-9]{1,5}$/', $pathOnly)) {
            return rtrim($url, '/');
        }

        return rtrim($url, '/').'/';
    }
}
