<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;

use App\City;
use App\Company;
use Input;
use View;


class CitiesController extends Controller
{
    public function index()
    {
        
         //$cities = City::with('companies')->orderBy('city_name', 'asc')->get();
         //return view('city', compact('cities', 'companies'));
        $counties = City::all();
        return view('city', compact('cities'));
       
    }

    public function city($id)
    {
       //$cities = City::with('company')->orderBy('city_name', 'asc')->get();
    
 
      
        //$company = Company::find($id)->get();
        /*
         $company = DB::table('companies')
            ->join('counties', 'companies.county_id', '=', 'counties.id')
            ->join('cities', 'companies.city_id', '=', 'cities.id')
            ->where( 'city_id', $id)
            ->get();    
       
            return view('filtercity', ['company' => $company]);

      
        */
        
    }

  
   
}
