<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Repositories\Sql\ClassRoomRepository;
use App\Repositories\Sql\GradeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ClassRoomController extends Controller
{
    protected $classRepo , $gradeRepo;

    public function __construct(ClassRoomRepository $classRepo , GradeRepository $gradeRepo)
    {
        $this->middleware('permission:class_rooms-read')->only(['index']);
        $this->middleware('permission:class_rooms-create')->only(['create', 'store']);
        $this->middleware('permission:class_rooms-update')->only(['edit', 'update']);
        $this->middleware('permission:class_rooms-delete')->only(['destroy']);
        $this->classRepo = $classRepo ;
        $this->gradeRepo = $gradeRepo ;

    }


    public function get_class_rooms()
    {
        $class_rooms = $this->classRepo->query();
        return DataTables($class_rooms)
        ->editColumn('grade' , function($class){
            return $class->grade->name;
        })
        ->editColumn('created_at' , function($class){
            return $class->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.class-rooms.actions')

        ->rawColumns(['action'])
        ->make(true);

    }

    public function index()
    {

         return view('dashboard.backend.class-rooms.index');
    }


    public function create()
    {
        $grades = $this->gradeRepo->getAll();
        return view('dashboard.backend.class-rooms.create' , compact('grades'));
    }


    public function store(Request $request)
    {

       $data = $request->only('name' , 'grade_id');
       $this->classRepo->create($data);
        return redirect(route('admin.class-rooms.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $room = $this->classRepo->findOne($id);
        $grades = $this->gradeRepo->getAll();
        return view('dashboard.backend.class-rooms.edit' , compact('room' , 'grades'));

    }


    public function update(Request $request, $id)
    {
         $class = $this->classRepo->findOne($id);
         $data = $request->only('name' , 'grade_id');


        $class->update($data);
        return redirect(route('admin.class-rooms.index'))->with('success', __('models.updated_successfully'));

    }


    public function destroy($id)
    {
         $class = $this->classRepo->findOne($id)->delete();
        return redirect(route('admin.class-rooms.index'))->with('success', __('models.deleted_successfully'));

    }

    public function classrooms($grade_id){
         return  ClassRoom::where('grade_id' , $grade_id)->pluck('name' , 'id');

    }
}
