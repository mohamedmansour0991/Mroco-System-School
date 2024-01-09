<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Repositories\Sql\CourseRepository;
use App\Repositories\Sql\TeacherRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    protected $courseRepo , $teacherRepo;

    public function __construct(CourseRepository $courseRepo , TeacherRepository $teacherRepo)
    {
        $this->middleware('permission:courses-read')->only(['index']);
        $this->middleware('permission:courses-create')->only(['create', 'store']);
        $this->middleware('permission:courses-update')->only(['edit', 'update']);
        $this->middleware('permission:courses-delete')->only(['destroy']);
        $this->courseRepo  = $courseRepo ;
        $this->teacherRepo = $teacherRepo ;
    }


    public function get_courses()
    {
        $courses = $this->courseRepo->query();
        return DataTables($courses)
        ->editColumn('teacher' , function($course){
            return $course->teacher->name ;
        })
        ->addColumn('action', 'dashboard.backend.courses.actions')

        ->rawColumns(['action'])
        ->make(true);

    }

    public function index()
    {

         return view('dashboard.backend.courses.index');
    }


    public function create()
    {
        $teachers = $this->teacherRepo->getAll();
        return view('dashboard.backend.courses.create' , compact('teachers'));
    }


    public function store(CourseRequest $request)
    {

       $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('courses');
        }

        $this->courseRepo->create($data);


        return redirect(route('admin.courses.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $course = $this->courseRepo->findOne($id);
        $teachers = $this->teacherRepo->getAll();
        return view('dashboard.backend.courses.edit' , compact('course' , 'teachers'));

    }


    public function update(CourseRequest $request, $id)
    {
         $course = $this->courseRepo->findOne($id);
         $data = $request->except('img' );

          if ($request->hasFile('img')) {

            Storage::delete($course->img);

            $data['img'] = $request->file('img')->store('courses');

        } else {
            $data['img'] = $course->img;
        }

        $course->update($data);
        return redirect(route('admin.courses.index'))->with('success', __('models.updated_successfully'));

    }


    public function destroy($id)
    {
         $course = $this->courseRepo->findOne($id)->delete();
        return redirect(route('admin.courses.index'))->with('success', __('models.deleted_successfully'));

    }
}
