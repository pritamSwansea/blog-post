<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

use Illuminate\Routing\Middleware\ValidateSignature as Middleware;

class ValidateSignature extends Middleware
{
    /**
     * The names of the query string parameters that should be ignored.
     *
     * @var array<int, string>
     */

    // 'fbclid',
    // 'utm_campaign',
    // 'utm_content',
    // 'utm_medium',
    // 'utm_source',
    // 'utm_term',
    protected $except = Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}
