<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Auth;

class PasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Home page url
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    protected $request;
    protected $user;

    /**
     * Create a new password controller instance.
     */
    public function __construct(User $user, Request $request)
    {
        $this->middleware('guest');
        $this->request = $request;
        $this->user = $user;
    }

    public function postEmail() 
    {
        error_reporting(-1);
        ini_set('display_errors', 'On');


        $params = $this->request->all();

        $validator = $this->validate($this->request, [
                'email' => 'required|email|exists:users'
            ], [
                'exists' => 'There is no user against the given email'
            ]);

        $user = $this->user->findByEmail($params['email']);
        $user->token = str_random(32);
        $user->save();

        Mail::send('auth.emails.password', [
            'token' => $user->token, 
            'email' => $user->email
        ], function($message) use ($user){
            $message->to($user->email, $user->name)->subject('Dingo - Reset Password');
        });

        return redirect('/')->with('status', 'A reset link been sent to your email address');
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset()
    {
        $request = $this->request;
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $user = $this->user->findByEmail($credentials['email']);

        if ($user->token != $credentials['token']) {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Invalid authentication token']);
        }

        $user->password = bcrypt($credentials['password']);
        $user->token = '';

        $user->save();

        Auth::loginUsingId($user->id);

        return redirect($this->redirectTo)->with('status', 'Password successfuly reset');
    }
}
