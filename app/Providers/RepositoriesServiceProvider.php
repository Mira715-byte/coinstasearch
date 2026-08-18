<?php namespace App\Providers;

use App\Articles\ElasticsearchArticlesRepository;
use App\Articles\EloquentArticlesRepository;
use App\Articles\ArticlesRepository;
use Elasticsearch\Client;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */

    protected $defer = true;

    public function register()
    {
        
    }
}
