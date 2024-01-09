<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{

    public function run(): void
    {
        ClassRoom::insert([


            [

               'name'        => 'First grade' ,
               'grade_id'    => 1 ,
               'created_at'  => now() ,
            ] ,

            [

                'name'        => 'Second grade' ,
                'grade_id'    => 1 ,
                'created_at'  => now() ,
            ] ,


            [

                'name'        => 'First grade' ,
                'grade_id'    => 2,
                'created_at'  => now() ,
            ] ,

            [

                'name'        => 'Second grade' ,
                'grade_id'    => 2,
                'created_at'  => now() ,
            ] ,


            [

                'name'        => 'First grade' ,
                'grade_id'    => 3 ,
                'created_at'  => now() ,
            ] ,


            [

                'name'        => 'Second grade' ,
                'grade_id'    => 3 ,
                'created_at'  => now() ,
            ] ,

            [

                'name'        => 'First grade' ,
                'grade_id'    => 4 ,
                'created_at'  => now() ,
            ] ,
            [

                'name'        => 'Second grade' ,
                'grade_id'    => 4 ,
                'created_at'  => now() ,
            ] ,





        ]);
    }
}
