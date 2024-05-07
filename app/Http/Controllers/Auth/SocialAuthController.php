<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Handle an incoming social authentication.
     *
     * @param  $driver
     * @return Laravel\Socialite\Facades\Socialite
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function redirectToProvider($driver)
    {
        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            return redirect()->route('login')->with('toast_error', $e->getMessage());
        }
    }

    /**
     * Handle a social provider callback authentication.
     *
     * @param  $driver
     * @return view
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function handleProviderCallback($driver)
    {
        $socialiteUser = Socialite::driver($driver)->user();
        $user = User::where($driver . '_id', $socialiteUser->id)->orWhere('email', $socialiteUser->email)->first();

        if ($user) {
            if ($user[$driver . '_id'] != $socialiteUser->id) {
                $user->update([
                    $driver . '_id' => $socialiteUser->id,
                ]);
            }

            Auth::login($user);

            if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin') {
                return redirect()->intended(route('admin.dashboard', absolute: false));
            }
        } else {
            return redirect()->route('login')->with('toast_error', 'User tidak terdaftar.');
        }
    }
}
