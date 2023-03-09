<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;


use App\Models\Blood;


class BloodSeeder extends Seeder
{

    public function run()
    {
        DB::table('bloods')->delete();

        $bloods = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

        foreach ($bloods as $blood){
            Blood::create(['Name' =>$blood]);
        }

    }

}
