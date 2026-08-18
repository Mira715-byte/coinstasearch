<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class CompaniesSearchController extends Controller
{
    public function search(Request $request) {
    	
    	if($request->has('search')) {
    		$companies = Company::search($request->get('search'))->get();
    	}else{
    		$companies = Company::get();
    	}
    	return view('listafirme', compact('companies'));
    	}
    
}
