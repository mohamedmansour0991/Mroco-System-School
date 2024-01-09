<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{

    public function run(): void
    {
        for ($i=0; $i < 20; $i++) {
            Room::create([
                'code'      => 'XP1-9' ,
                'body'      => 'X' ,
                'floor'      => 'P' ,
                'hall_no'      => '19' ,
                'capacity'      => '20' ,

            ]);
        }
    }
}
