<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Grade;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Relations\BelongsTo ;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    //للترجمة عمود واحد
    use HasTranslations;

    public $translatable = ['Name_Class'];


    public function Grades(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'Grade_id', 'id');
    }

}
