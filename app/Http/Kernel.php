<?php

namespace App\Http;

use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Middleware\TrustProxies;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use App\Http\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Auth\Middleware\Authenticate as MiddlewareAuthenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated as MiddlewareRedirectIfAuthenticated;
use Illuminate\Cookie\Middleware\EncryptCookies as MiddlewareEncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as MiddlewareVerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Routing\Middleware\ThrottleRequests;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \App\Http\Middleware\TrustHosts::class,
        TrustProxies::class,
        HandleCors::class,
        PreventRequestsDuringMaintenance::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            MiddlewareEncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            MiddlewareVerifyCsrfToken::class,
            SubstituteBindings::class,
        ],

        'api' => [
            
            ThrottleRequests::class . ':api',
            SubstituteBindings::class,
        ],
    ];

    protected $middlewareAliases = [
    // middleware bawaan
    'auth' => Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can' => \Illuminate\Auth\Middleware\Authorize::class,
    'guest' => RedirectIfAuthenticated::class,
    'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
    'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
    'throttle' => ThrottleRequests::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'UserAccess' => \App\Http\Middleware\UserAccess::class,
    // 'role' => \App\Http\Middleware\CheckRole::class,
    ];

}
