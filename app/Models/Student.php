<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function grade(){
        return $this->belongsTo(Grade::class , 'grade_id');
    }


    public function classroom(){
        return $this->belongsTo(ClassRoom::class , 'class_room_id');
    }


    public function section(){
        return $this->belongsTo(Section::class , 'section_id');
    }

}