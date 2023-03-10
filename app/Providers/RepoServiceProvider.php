<?php

namespace App\Providers;

// use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\ServiceProvider;


use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;


class RepoServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
    }


    public function boot()
    {
    
    }
}
