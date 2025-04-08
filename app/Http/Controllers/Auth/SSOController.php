<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SSO\GoogleSSOService;
use App\Services\SSO\MicrosoftSSOService;
use App\Services\SSO\OktaSSOService;
use Illuminate\Http\Request;

class SSOController extends Controller
{
    protected $providers = [
        'google' => GoogleSSOService::class,
        'microsoft' => MicrosoftSSOService::class,
        'okta' => OktaSSOService::class,
    ];

    public function redirect($provider)
    {
        if (!array_key_exists($provider, $this->providers)) {
            return redirect()->route('login')->with('error', 'Invalid SSO provider');
        }

        $service = new $this->providers[$provider]();
        return $service->redirect();
    }

    public function callback($provider)
    {
        if (!array_key_exists($provider, $this->providers)) {
            return redirect()->route('login')->with('error', 'Invalid SSO provider');
        }

        try {
            $service = new $this->providers[$provider]();
            return $service->handleCallback();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'SSO authentication failed');
        }
    }
} 