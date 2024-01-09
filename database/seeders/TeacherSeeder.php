<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{

    public function run(): void
    {
        $fake = Factory::create();
        for ($i=1; $i < 10 ; $i++) {
            Teacher::create([

                'name'       => $fake->name ,
                'age'        => rand(30 , 40) ,
                'subject'    => $fake->firstName() ,
                'address'    => 'Aga' ,
                'joinimg_date'=> now() ,
                'gender'     => 'male' ,
                'email'      => $fake->email() ,

            ]);
        }
    }
}
