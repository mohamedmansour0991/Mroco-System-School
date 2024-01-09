<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{

    public function run(): void
    {
        Setting::create([

            'logo'            => 'setting/1.png' ,
            'twitter'         => 'twitter' ,
            'facebook'        => 'facebook' ,
            'youtube'         => 'youtube' ,
            'instagram'       => 'instagram' ,
            'linkedin'         => 'linkedin' ,
            'wattsapp'        => '001488452' ,
            'phone'           => '43542525' ,
            'location'        => 'Egypt' ,
            'email'           => 'email@yahoo.com' ,
            'gmail'           => 'gmail@yahoo.com' ,
            'type'            => 'setting' ,


        ]);
    }
}
