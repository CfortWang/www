<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://www.beanpop.cn//UnionPayReturn',
        'http://www.beanpop.cn//AliPayNotify',
        'http://www.beanpop.cn//UnionNotify',
    ];
}
