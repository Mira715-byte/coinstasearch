<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use View;
use Session;
use Validator;
use Input;
use Redirect;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function updateEmail(Request $request)
    {

        $identity = Auth::user();
        if( !$identity || !$identity->user()  ) {
            return $this->respondNotFound( 'User not authenticated' );
        }
        //$identity->email = Request::input( 'email' );
        $identity->email = $request->get('email');
        $identity->save();
        //return $this->setStatusCode( 200 )->respond( ['data' => 'Email was updated'] );
        return Redirect::to('userhome');
    }
    
    public function updatePassword(Request $request)
    {
        $identity = Auth::user();
        if( !$identity ) {
            return $this->respondNotFound( 'User not authenticated' );
        }

        $data = Input::all();
        $rule = [
            'current_password' => 'required',
            'new_password'     => 'required|min:3|same:confirm_password',
            'confirm_password' => 'required|min:3'
        ];

        $message = [
            'confirm_password.required' => 'The confirm password field is required.',
            'confirm_password.min'      => 'The confirm password must be at least 3 characters',
            'new_password.same'         => 'The new password and confirm password field must match.',
        ];
        
        $validator = Validator::make( $data, $rule, $message );
        
        if( $validator->fails() ) {
            //return $this->respond( $validator->messages()->first() );
            return Redirect::to('/userhome/settings')
                ->withErrors($validator);
        }
        else {
            $identity->password = Hash::make( $request->get('new_password') );
            $identity->save();
            //return $this->respond( ['data' => 'Password was updated'] );
            return Redirect::to('/userhome');
        }
    }
}
