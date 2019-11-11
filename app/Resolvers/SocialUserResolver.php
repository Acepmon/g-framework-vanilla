<?php

namespace App\Resolvers;

use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\RegisterController;
use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Facades\Socialite;

class SocialUserResolver implements SocialUserResolverInterface
{
    /**
     * Resolve user by provider credentials.
     *
     * @param string $provider
     * @param string $accessToken
     *
     * @return Authenticatable|null
     */
    public function resolveUserByProviderCredentials(string $provider, string $accessToken): ?Authenticatable
    {
        // Return the user that corresponds to provided credentials.
        // If the credentials are invalid, then return NULL.
        $providerUser = null;
        
        try {
            $providerUser = Socialite::driver($provider)->userFromToken($accessToken);
        } catch (Exception $exception) {}
        
        if ($providerUser) {
            return RegisterController::registerUserFromSocialite($providerUser, $provider);
        }
        return null;
    }
}