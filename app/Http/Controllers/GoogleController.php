<?php

namespace App\Http\Controllers;

use App\Models\User;
use Google\Client;
use Google\Service\Oauth2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        $googleClient = new Client();
        $googleClient->setRedirectUri(config('services.google.redirect'));
        $googleClient->setClientId(config('services.google.client_id'));
        $googleClient->setPrompt('consent select_account');
        $googleClient->setScopes(['openid', 'profile', 'email']);

        $redirectUrl = $googleClient->createAuthUrl();

        return redirect($redirectUrl);
    }

    public function handleGoogleCallback(Request $request)
    {
        $code = $request->get('code');

        if (!$code) {
            return redirect()->route('login.index')->with('error', ' Google.');
        }

        $client = new Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));

        $token = $client->fetchAccessTokenWithAuthCode($code);

        if (isset($token['error'])) {
            return redirect()->route('login.index')->with('error', ' Google.');
        }

        $client->setAccessToken($token['access_token']);

        $service = new Oauth2($client);
        $googleUser = $service->userinfo->get();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => Hash::make(Str::random(16)),
            ]
        );

        Auth::login($user);

        return redirect()->route('dashboard.index');
    }

}
