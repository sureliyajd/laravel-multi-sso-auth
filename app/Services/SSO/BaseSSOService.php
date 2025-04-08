<?php

namespace App\Services\SSO;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

abstract class BaseSSOService
{
    protected $provider;

    public function __construct(string $provider)
    {
        $this->provider = $provider;
    }

    abstract public function redirect();
    abstract public function handleCallback();

    protected function findOrCreateUser($socialiteUser)
    {
        $user = User::where('email', $socialiteUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
                'password' => bcrypt(Str::random(16)),
                'provider' => $this->provider,
                'provider_id' => $socialiteUser->getId(),
            ]);
        }

        return $user;
    }

    protected function loginUser($user)
    {
        Auth::login($user);
    }
} 