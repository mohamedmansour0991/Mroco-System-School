<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ClassRoom;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\Room;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()  {

        $roles = Role::count();
        $admins = Admin::count();
        $grades = Grade::count();
        $sections = Section::count();
        $teachers = Teacher::count();
        $courses = Course::count();
        $class_rooms = ClassRoom::count();
        $rooms = Room::count();



        return view('dashboard.home' , compact('roles' ,'admins' , 'grades', 'sections', 'teachers', 'courses' , 'class_rooms' , 'rooms'));
    }




}
