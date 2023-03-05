<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Classroom;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory;

    protected $guarded=[];

    
    //للترجمة عمود واحد
    use HasTranslations;

    public $translatable = ['Name_Grade'];


    // public function classroom(): HasMany
    // {
    //     return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    // }

    
}
