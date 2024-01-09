<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\CourseRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $courseRepo ;

    public function __construct(CourseRepository $courseRepo)
    {

        $this->courseRepo = $courseRepo ;

    }

    public function home(){
        $courses = $this->courseRepo->getAll();
       return view('site.front.home' , compact('courses'));
    }

    public function course_details($id){

      $course = $this->courseRepo->findOne($id);

      if(auth()->user()){

          return view('site.front.course' , compact('course'));
      }else{

        return redirect()->route('user.login');
      }
    }
}
