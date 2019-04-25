<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\Msisdn;
use App\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        // if user's email has not been verified, mark it as verified
        // because they successfully reset their password.
        if ($user->email_verified_at == null) {
            $user->markEmailAsVerified();
        }

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    public function getPasswordResetPhone()
    {
        return view('website.auth.passwords.reset_phone');
    }

    public function passwordDoResetPhone(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', new Msisdn(), 'exists:users,phone'],
            'code' => ['required'],
            'new_password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::where('phone',$request->phone)->first();

        if ($user->phone_verification_code == $request->code) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()->route('website.home')->with(['modal' => 'login-register'])->withSuccess('password reset successfully');
        } else {
            return redirect()->back()->withInput()->withError('reset code is invalid');
        }
    }
}
