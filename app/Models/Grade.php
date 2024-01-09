<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function classrooms(){
       return $this->hasMany(ClassRoom::class , 'grade_id');
    }


    public function sections(){
        return $this->hasMany(Section::class , 'grade_id');
    }


    public function students(){
        return $this->hasMany(Student::class , 'grade_id');
    }

}
