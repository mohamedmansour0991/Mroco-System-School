<?php

namespace Database\Seeders;

use App\Models\Course;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{

    public function run(): void
    {
        $fake = Factory::create();
        for ($i=1; $i < 20 ; $i++) {

            Course::create([

                'name'            => $fake->name() ,
                'img'             => 'courses/'.rand(1,3).'.png' ,
                'desc'            => $fake->text(200) ,
                'teacher_id'      => rand(1,9) ,
                'price'           => rand(100,200) ,
                'rate'            => rand(1,5) ,
                'students'        => rand(10,20) ,

            ]);
        }
    }
}
