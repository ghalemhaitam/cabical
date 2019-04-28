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
        //
    ];

    protected function tokensMatch($request)
    {
       // return parent::tokensMatch($request); // TODO: Change the autogenerated stub
        $token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');
        return $request->session()->token() == $token;
    }
}
