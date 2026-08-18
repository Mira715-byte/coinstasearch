<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Session;
use View;
use Auth;
use Input;
use Hash;
use Redirect;
use Validator;

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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } */

    public function showLogin()
    {
        return View::make( 'home' );
    }

    public function doLogin()
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ];

        $message = [
            'email.required' => 'The email is required.',
            'email.required' => 'The confirm password must be at least 3 characters',
            'password.min'   => 'The confirm password must be at least 3 characters',
        ];

        // run the validation rules on the inputs from the form
        $validator = Validator::make( Input::all(), $rules, $message );

        // if the validator fails, redirect back to the form
        if( $validator->fails() ) {
            return Redirect::to( 'login' )
                ->withErrors( $validator->messages() )// send back all errors to the login form
                ->withInput( Input::except( 'password' ) ); // send back the input (not the password) so that we can repopulate the form
        }
        else {
            // create our user data for the authentication
            $userdata = [
                'email'    => Input::get( 'email' ),
                'password' => Input::get( 'password' )
            ];

            // attempt to do the login
            if( Auth::attempt( $userdata ) ) {

                if( Auth::user()->user_id ) {
                    return Redirect::to( 'userhome' );
                }
                elseif( Auth::user()->company_id ) {
                    return Redirect::to( 'listafirme' );
                }
                elseif( Auth::user()->admin_id ) {
                    return Redirect::to( 'admin/companies' );
                }
            }

            return Redirect::to( 'login' );
        }
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to( '/' ); // redirect the user to the main screen
    }
}
