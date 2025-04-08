<?php

namespace App\Services\SSO;

use Laravel\Socialite\Facades\Socialite;

class GoogleSSOService extends BaseSSOService
{
    public function __construct()
    {
        parent::__construct('google');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        $socialiteUser = Socialite::driver('google')->user();
        $user = $this->findOrCreateUser($socialiteUser);
        $this->loginUser($user);

        return redirect()->intended('/dashboard');
    }
} 