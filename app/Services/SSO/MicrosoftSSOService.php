<?php

namespace App\Services\SSO;

use Laravel\Socialite\Facades\Socialite;

class MicrosoftSSOService extends BaseSSOService
{
    public function __construct()
    {
        parent::__construct('microsoft');
    }

    public function redirect()
    {
        return Socialite::driver('microsoft')
            ->with(['scope' => 'user.read'])
            ->redirect();
    }

    public function handleCallback()
    {
        $socialiteUser = Socialite::driver('microsoft')->user();
        $user = $this->findOrCreateUser($socialiteUser);
        $this->loginUser($user);

        return redirect()->intended('/dashboard');
    }
} 