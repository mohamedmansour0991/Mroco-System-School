<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{

    public function run(): void
    {

        Grade::insert([





                [
                   'name'       => 'Primary stage' ,
                   'created_at' => now() ,
                ] ,

                [
                    'name'       => 'middle School' ,
                    'created_at' => now() ,
                ] ,


                [
                    'name'       => 'High school' ,
                    'created_at' => now() ,
                ] ,

                [
                    'name'       => 'University stage' ,
                    'created_at' => now() ,
                ] ,

        ]);
    }
}
