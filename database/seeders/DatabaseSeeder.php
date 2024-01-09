<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

       $this->call(LaratrustSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(ClassRoomSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(SettingSeeder::class);








    }
}
