<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

use App\Models\Religion;

class ReligionSeeder extends Seeder
{

    public function run()
    {
        DB::table('religions')->delete();

        $religions =[
            [ 'en' => 'Islam' ,'ar' => 'اسلام' ],
            [ 'en' => 'Christian' ,'ar' => 'نصراني' ],
            [ 'en' => 'Other' ,'ar' => 'غير ذلك' ],
        ];

        foreach ($religions as $religion){

            Religion::create(['Name' =>$religion]);

        }


    }
}
