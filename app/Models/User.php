<?php

namespace App\Models;


use Spatie\Translatable\HasTranslations;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}



// $newsItem = new NewsItem(); // This is an Eloquent model
// $newsItem
//    ->setTranslation('name', 'en', 'Name in English')
//    ->setTranslation('name', 'nl', 'Naam in het Nederlands')
//    ->save();

// $newsItem->name; // Returns 'Name in English' given that the current app locale is 'en'
// $newsItem->getTranslation('name', 'nl'); // returns 'Naam in het Nederlands'

// app()->setLocale('nl');

// $newsItem->name; // Returns 'Naam in het Nederlands'