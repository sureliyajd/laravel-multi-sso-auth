<?php

namespace App\Services\SSO;

use Laravel\Socialite\Facades\Socialite;

class OktaSSOService extends BaseSSOService
{
    public function __construct()
    {
        parent::__construct('okta');
    }

    public function redirect()
    {
        return Socialite::driver('okta')->redirect();
    }

    public function handleCallback()
    {
        $socialiteUser = Socialite::driver('okta')->user();
        $user = $this->findOrCreateUser($socialiteUser);
        $this->loginUser($user);

        return redirect()->intended('/dashboard');
    }
} 