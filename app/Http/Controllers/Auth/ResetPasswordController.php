<?php

namespace Website\Http\Controllers\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Website\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

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
    protected $redirectTo = '/curriculo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

//    /**
//     * Display the password reset view for the given token.
//     *
//     * If no token is present, display the link request form.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  string|null  $token
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function showResetForm(Request $request, $token = null)
//    {
//        return view('auth.passwords.reset')->with(
//            ['token' => $token, 'email' => $request->email]
//        );
//    }
//
//    /**
//     * Get the password reset validation rules.
//     *
//     * @return array
//     */
//    protected function rules()
//    {
//        return [
//            'token' => 'required',
//            'ds_mail' => 'required|email',
//            'password' => 'required|confirmed|min:8',
//        ];
//    }
//
//    /**
//     * Get the password reset credentials from the request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
//    protected function credentials(Request $request)
//    {
//        return $request->only(
//            'ds_mail', 'password', 'password_confirmation', 'token'
//        );
//    }
//
//    /**
//     * Get the response for a failed password reset.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  string  $response
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
//     */
//    protected function sendResetFailedResponse(Request $request, $response)
//    {
//        return redirect()->back()
//            ->withInput($request->only('ds_mail'))
//            ->withErrors(['ds_mail' => trans($response)]);
//    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('ds_mail');
    }
}
