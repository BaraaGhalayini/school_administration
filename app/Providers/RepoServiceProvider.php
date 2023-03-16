<?php

namespace App\Providers;

// use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\ServiceProvider;

use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;

use App\Repository\GradeRepository;
use App\Repository\GradeRepositoryInterface;

use App\Repository\TestRepository;
use App\Repository\TestRepositoryInterface;


class RepoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(GradeRepositoryInterface::class, GradeRepository::class);
        $this->app->bind(TestRepositoryInterface::class, TestRepository::class);
    }


    public function boot()
    {
        
    }
}
