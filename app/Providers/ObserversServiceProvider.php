<?php

namespace App\Providers;

use App\Observers\ElasticsearchCompanyObserver;
use App\Company;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

use App\Search\ElasticsearchObserver;

$client = ClientBuilder::create()->build();


class ObserversServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
       
    }

    public function register()
    {
        
    }
}