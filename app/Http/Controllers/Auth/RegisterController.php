<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Company;
use App\Identity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use View;
use Auth;
use Input;
use Hash;
use Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    /*
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
*/







    public function register()
    {
        $data = ['errors' => Session::get( 'errors' )];
        return View::make( 'auth.register', $data );
    }

    public function doRegisterUser(Request $request)
    {
        $data = Input::all();
        $rule = [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email|unique:identities',
            'password'  => 'required|min:3|same:cpassword',
            'cpassword' => 'required|min:3'
        ];

        $message = [
            'cpassword.required' => 'The confirm password field is required.',
            'cpassword.min'      => 'The confirm password must be at least 6 characters',
            'password.same'      => 'The :attribute and confirm password field must match.',
        ];

        //$validator = $this->validate( $request, $data, $rule, $message );
        $validator = Validator::make($data, $rule, $message);

        if( $validator->fails() ) {
            return Redirect::to( 'register' )
                ->withErrors( $validator->messages() );
        }
        else {
           $user = new User;
            //$user->fill( Input::except( ['_token', 'cpassword'] ) );
            $user->fill( [
                'firstname'    => Input::get( 'firstname' ),
                'lastname'    => Input::get( 'lastname' ),
                ] );
            $user->save();

            $identity = new Identity;
            $identity->fill( [
                'email'    => Input::get( 'email' ),
                'password' => Hash::make( Input::get( 'password' ) ),
                'user_id'  => $user->id,
            ] );
            $identity->save();

            Auth::attempt( [
                'email'    => Input::get( 'email' ),
                'password' => Input::get( 'password' )
            ] );

            return Redirect::to( 'userhome' );
        }
    }

    public function doRegisterCompany(Request $request)
    {
        //$data = Input::all();
        $rule = [
            'company_name' => 'required',
            'phone' => 'required',
            'email'        => 'required|email|unique:identities',
            'password'     => 'required|min:3|same:cpassword',
            'cpassword'    => 'required|min:3'
        ];

        $message = [
            'cpassword.required' => 'The confirm password field is required.',
            'cpassword.min'      => 'The confirm password must be at least 6 characters',
            'password.same'      => 'The :attribute and confirm password field must match.',
        ];

        //$validator = $this->validate( $request, $data, $rule, $message );
        $validator = Validator::make( $rule, $message);
        
        if( $validator->fails() ) {
            return Redirect::to( 'register' )
                ->withErrors( $validator->messages() );
        }
        else {
            $company = new Company;
            //$company->fill( Input::except( ['_token', 'cpassword'] ) );
             $company->fill([
                'phone'    => Input::get( 'phone' ),
                'company_name'    => Input::get( 'company_name' ),
                ] );
            

            $company->save();

            $identity = new Identity;
            $identity->fill( [
                'email'      => Input::get( 'email' ),
                'password'   => Hash::make( Input::get( 'password' ) ),
                'company_id' => $company->id
            ] );
            $identity->save();
            /*
            Auth::attempt( [
                'email'    => Input::get( 'email' ),
                'password' => Input::get( 'password' )
            ] );
            
            return Redirect::to( 'companyhome' );
            */
            Auth::attempt([
                'email'    => Input::get( 'email' ),
                'password' => Input::get( 'password' )
            ]);
            
            return Redirect::to( 'companyhome' );
        }
    }
}
