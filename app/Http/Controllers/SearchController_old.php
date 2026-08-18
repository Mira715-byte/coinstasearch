<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class SearchController extends Controller
{
    public function query()
    {
        // queries to Algolia search index and returns matched records as Eloquent Models
        $companies = Company::search('company_name')->get();
         
        // do the usual stuff here
        foreach ($companies as $company) {
          // ...
        }
    }
 
    public function add()
    {
        // this post should be indexed at Algolia right away!
        $compnay = new Company;
        $company->setAttribute('company_name', 'comp4');
                $company->CUI = $request->get('CUI');

        //$post->setAttribute('user_id', '1');
        $company->save();
    }
     
    public function delete()
    {
        // this post should be removed from the index at Algolia right away!
        $company = Company::find(1);
        $company->delete();
    }
}
