<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

use App\Company;
use App\County;
use App\Domain;



class DomainsController extends Controller
{
    public function index()
    {
        $domains = Domain::all();
        return view('domain', compact('domains'));
       
    }
}
