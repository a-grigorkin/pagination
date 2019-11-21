<?php

namespace AndrewGrigorkin\Pagination;

use Illuminate\Support\ServiceProvider;

class PaginationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'pagination');
    }

    public function register()
    {
        
    }
}
