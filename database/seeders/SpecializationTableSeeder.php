<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SpecializationTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('specialization')->delete();

        $specializations =[
            [ 'en' => 'Arabic' ,'ar' => 'عربي' ],
            [ 'en' => 'English' ,'ar' => 'انجليزي' ],
            [ 'en' => 'Computer' ,'ar' => 'حاسب ألي' ],
            [ 'en' => 'Sciences' ,'ar' => 'علوم' ],
        ];

        foreach ($specializations as $specialization){

            Specialization::create(['Name' =>$specialization]);

        }

    }
}
