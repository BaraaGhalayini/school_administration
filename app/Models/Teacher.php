<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Section;

    use Illuminate\Database\Eloquent\Relations\BelongsTo ;


class Teacher extends Model
{
    use HasFactory;
    protected $guarded=[];

    use HasTranslations;

    public $translatable = ['Name'];



    public function GetGender(): BelongsTo
    {
        return $this->belongsTo(Gender::class, 'Gender_id' , 'id');
    }


    public function GetSpecialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class, 'Specialization_id' , 'id');
    }


    public function GetSection(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'teacher_section' , 'id');
    }

}
