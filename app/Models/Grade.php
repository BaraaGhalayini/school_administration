<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Models\Classroom;
use App\Models\Section;


class Grade extends Model
{
    use HasFactory;

    protected $guarded=[];

    
    //للترجمة عمود واحد
    use HasTranslations;

    public $translatable = ['Name_Grade'];


    public function classroom(): HasMany
    {
        return $this->hasMany(Classroom::class, 'Grade_id', 'id');
    }



    public function Sections(): HasMany
    {
        return $this->hasMany(Section::class, 'Grade_id', 'id');
    }
    
}
