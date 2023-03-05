<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Grade;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasFactory;

    
    //للترجمة عمود واحد
    use HasTranslations;

    public $translatable = ['Name_Class'];

    
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'Grade_id', 'id');
    }
}
