<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use App\Models\Grade;


class Section extends Model
{

    use HasFactory;
    protected $guarded=[];
    
    //للترجمة عمود واحد
    use HasTranslations;

    public $translatable = ['Name_Section'];



    public function Grades(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'Grade_id', 'id');
    }


}
