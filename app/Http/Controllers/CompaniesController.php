<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Company;
use App\County;
use Auth;
use View;
use Session;
use Validator;
use Input;
use Redirect;
use Hash;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
         /*
        $companies = DB::table('companies')
            ->join('counties', 'companies.county_id', '=', 'counties.id')
            ->join('cities', 'companies.city_id', '=', 'cities.id')->get();    
       
            return view('listafirme', ['companies' => $companies]);
        */
        
        if($request->has('')) {
            $companies = Company::search($request->get('search'))->get();
        }else{
            $companies = Company::get();
        }
        return view('listafirme', compact('companies'));
        
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if($request->has('')) {
            $company = Company::search($request->get('search'))->get();
        }else{
            $company = Company::find($id);
        }

        return View::make('companies.show')
            ->with ('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
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
         
        $rules = array(
            'company_name' => 'required',
            'CUI'          => 'required',
            'no_reg'       => 'required',
            'EUID'         => 'required',
            'startdate'   => 'required',
            'comments'     => 'required',
            'OSIM'         => 'required',
            'about'        => 'required',       
            'address'      => 'required',
            'phone'        => 'required',
            'fax'          => 'required',
            'mobile'       => 'required',
            'admins'       => 'required',
            'web'          => 'required',
            'CAEN'         => 'required',
            'activity'     => 'required',
            'activity_description' => 'required',              

        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/companyhome/editcompany')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
          
        $company = Company::find($id);
        
        $identity = Auth::user();

        $county = $request->county_id; 

        $company->county()->sync($county);
        
        if( !$identity || !$identity->company()  ) {
            return $this->respondNotFound( 'User not authenticated' );
        }
        $company->company_name = $request->get('company_name');
        $company->CUI = $request->get('CUI');
        $company->no_reg = $request->get('no_reg');
        $company->EUID = $request->get('EUID');
        $company->startdate = $request->get('startdate');
        $company->comments = $request->get('comments');
        $company->OSIM = $request->get('OSIM');
        $company->about = $request->get('about');
        $company->address = $request->get('address');
        $company->phone = $request->get('phone');
        $company->mobile = $request->get('mobile');
        $company->fax = $request->get('fax');
        $company->admins = $request->get('admins');
        $company->web = $request->get('web');
        $company->CAEN = $request->get('CAEN');
        $company->activity = $request->get('activity');
        $company->activity_description = $request->get('activity_description');

        $company->save();
            
        // redirect
        Session::flash('message', 'Succesfully updated company!');
        return Redirect::to('listafirme');
        
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 
        Company::where('id', $id)->delete();

        Session::flash('message', 'Succesfully deleted the company!');
        return Redirect::to('/');
    }
    
    public function upload() 
    {
        $file = Input::file('file');
        
        // Build the input for validation
        $fileArray = array('image' => $file);
        $rules = array(
            'image' => 'image|required|max:10000' // max 10000kb
        );
        
        $message = [
            'image.required'     => 'An image is required.',
            'image.image'      => 'The extension of the image must be jpg, png, or gif.',
            'image.max'      => 'Maximum 10000kb.',
        ];
        
        // pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules);
        
        if( $validator->fails() ) {
            return Redirect::to( 'companyhome' )
                ->withErrors( $validator->messages() );
        }
        else {
            
            $filename = time(). '-' . $file->getClientOriginalName();

            $file = $file->move(public_path().'/images/', $filename);
            $identity = Auth::user();
            $photo = $identity->company();
            $photo->photo_path = 'images/'.$filename;
            $photo->save();
        }
        
        return Redirect::to('companyhome');
    }

    public function updateEmail(Request $request)
    {

        $identity = Auth::user();
        if( !$identity || !$identity->company()  ) {
            return $this->respondNotFound( 'User not authenticated' );
        }
        //$identity->email = Request::input( 'email' );
        $identity->email = $request->get('email');
        $identity->save();
        //return $this->setStatusCode( 200 )->respond( ['data' => 'Email was updated'] );
        return Redirect::to('companyhome');
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
            return Redirect::to('/companyhome/settings')
                ->withErrors($validator);
        }
        else {
            $identity->password = Hash::make( $request->get('new_password') );
            $identity->save();
            //return $this->respond( ['data' => 'Password was updated'] );
            return Redirect::to('/companyhome');
        }
    }


}

