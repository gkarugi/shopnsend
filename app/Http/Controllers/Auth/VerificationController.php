<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\Msisdn;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function editPhone(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', 'numeric', new Msisdn(), 'unique:users'],
        ]);

        auth()->user()->update([
            'phone' => $request->get('phone'),
        ]);

        return redirect()->back()->withSuccess('Mobile number updated successfully');

    }

    public function verifyPhone(Request $request)
    {
        if ($request->get('code') == $request->user()->phone_verification_code) {
            $request->user()->markPhoneAsVerified();

            return redirect()->back()->withSuccess('Phone verified successfully');
        }

        return redirect()->back()->withError('Verification code is invalid. Could\'nt verify your phone number');
    }

    public function resendCode(Request $request)
    {
        $request->user()->sendPhoneVerificationNotification();

        return redirect()->back()->withSuccess('Verification code has been resent');
    }
}
