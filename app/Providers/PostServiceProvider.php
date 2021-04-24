<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostService::class, function ($app) {
            return new PostService($app->make(PostRepository::class), $app->make(\Illuminate\Support\Facades\Cache::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
