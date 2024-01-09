<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function grade(){
        return $this->belongsTo(Grade::class , 'grade_id');
    }

    public function sections(){
        return $this->hasMany(Section::class , 'class_room_id');
    }

}
