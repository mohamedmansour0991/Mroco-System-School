<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{

    public function run(): void
    {
        $fake = Factory::create();
        for ($i=1; $i < 50 ; $i++) {
            Student::create([
                'name'             => $fake->name() ,
                'age'              => rand(10 , 20) ,
                'address'          => 'aga' ,
                'gender'           => 'male' ,
                'email'            => $fake->email() ,
                'grade_id'         => rand(1,4) ,
                'class_room_id'    => rand(1,8) ,
            ]);
        }
    }
}
