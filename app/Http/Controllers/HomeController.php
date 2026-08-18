<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use View;
use Auth;
use App\Company;
use App\County;
use App\City;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
       $companies = Company::all();
       
        

         
        return view('home', compact('companies'));
    } 

    public function userHome()
    {
        if (!Auth::check()) {
            return Redirect::to('login');
        }
        return View::make( 'users.userhome', ['identity' => Auth::user()] );
    }
    
    public function companyHome()
    {
        return View::make( 'users.companyhome', ['identity' => Auth::user()] );
    }
 public function showCity()
    {
        
       

        
        $cities = City::with('companies')->orderBy('city_name', 'asc')->get();

         return view('city', compact('companies, cities'));
    }
     public function showCounty()
    {
        $companies = Company::with('counties')->get();
   
            return view('county', compact('companies'));
    }

    

}
