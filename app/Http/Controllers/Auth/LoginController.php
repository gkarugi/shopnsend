<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/  ';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'changePassword']);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        $identity  = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        request()->merge([$fieldName => $identity]);

        return $fieldName;
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate( $request, [
                'identity' => 'required|string',
                'password' => 'required|string',
            ], [
                'identity.required' => 'Phone or email is required',
                'password.required' => 'Password is required',
            ]
        );
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        session()->flash('success','Hey, Welcome back ' . $user->name . '!');

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'identity' => [trans('auth.failed')],
            'modal' => 'login'
        ]);
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        session()->flash('success', 'Hey, You\'ve logged out successfully!');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
           'new_password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

        $canAuth = Hash::check($request->current_password, $request->user()->password);

        if ($canAuth) {
            $request->user()->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->back()->withSuccess('You have successfully updated your password');
        }

        return redirect()->back()->withError('A problem occurred. Your password has not been updated.');
    }
}
