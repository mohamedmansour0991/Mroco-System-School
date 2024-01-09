<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TeacherRequest;
use App\Repositories\Sql\TeacherRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TeacherController extends Controller
{
    protected $teacherRepo ;

    public function __construct(TeacherRepository $teacherRepo)
    {
        $this->middleware('permission:teachers-read')->only(['index']);
        $this->middleware('permission:teachers-create')->only(['create', 'store']);
        $this->middleware('permission:teachers-update')->only(['edit', 'update']);
        $this->middleware('permission:teachers-delete')->only(['destroy']);
        $this->teacherRepo = $teacherRepo ;

    }


    public function get_teachers()
    {
        $teachers = $this->teacherRepo->query();
        return DataTables($teachers)
        ->editColumn('created_at' , function($teacher){
            return $teacher->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.teachers.actions')

        ->rawColumns(['action'])
        ->make(true);

    }

    public function index()
    {

         return view('dashboard.backend.teachers.index');
    }


    public function create()
    {
         return view('dashboard.backend.teachers.create');
    }


    public function store(TeacherRequest $request)
    {

       $data = $request->all();
       $this->teacherRepo->create($data);
        return redirect(route('admin.teachers.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $teacher = $this->teacherRepo->findOne($id);
        return view('dashboard.backend.teachers.edit' , compact('teacher'));

    }


    public function update(TeacherRequest $request, $id)
    {
        $teacher = $this->teacherRepo->findOne($id);
        $data = $request->all();
        $teacher->update($data);
        return redirect(route('admin.teachers.index'))->with('success', __('models.updated_successfully'));

    }


    public function destroy($id)
    {
         $teacher = $this->teacherRepo->findOne($id)->delete();
        return redirect(route('admin.teachers.index'))->with('success', __('models.deleted_successfully'));

    }
}
