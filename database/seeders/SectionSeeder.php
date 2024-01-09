<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{

    public function run(): void
    {

        for ($i=1; $i < 20 ; $i++) {

            Section::create([
               'name'           => 'Section Number ' . $i  ,
               'grade_id'       => rand(1,4) ,
               'class_room_id'  => rand(1,8) ,
               'created_at'     => now() ,
            ]);

        }
    }
}
