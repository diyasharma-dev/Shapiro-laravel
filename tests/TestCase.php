<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Uri;

abstract class TestCase extends BaseTestCase
{
    /**
     * Prepare the URL for a request, preserving trailing slashes if present in the test input.
     *
     * @param  mixed  $uri
     * @return string
     */
    protected function prepareUrlForRequest($uri)
    {
        $uriString = $uri instanceof Uri ? $uri->value() : (string) $uri;
        $hadTrailingSlash = str_ends_with($uriString, '/');

        $url = parent::prepareUrlForRequest($uri);

        return $hadTrailingSlash ? $url.'/' : $url;
    }
}
