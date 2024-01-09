<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\GradeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GradeController extends Controller
{
    protected $gradeRepo ;

    public function __construct(GradeRepository $gradeRepo)
    {
        $this->middleware('permission:grades-read')->only(['index']);
        $this->middleware('permission:grades-create')->only(['create', 'store']);
        $this->middleware('permission:grades-update')->only(['edit', 'update']);
        $this->middleware('permission:grades-delete')->only(['destroy']);
        $this->gradeRepo = $gradeRepo ;

    }


    public function get_grades()
    {
        $grades = $this->gradeRepo->query();
        return DataTables($grades)
        ->editColumn('created_at' , function($grade){
            return $grade->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.grades.actions')

        ->rawColumns(['action'])
        ->make(true);

    }

    public function index()
    {

        return view('dashboard.backend.grades.index');
    }


    public function create()
    {
         return view('dashboard.backend.grades.create');
    }


    public function store(Request $request)
    {

        $data = $request->only('name');
        $this->gradeRepo->create($data);
        return redirect(route('admin.grades.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $grade = $this->gradeRepo->findOne($id);
        return view('dashboard.backend.grades.edit' , compact('grade'));

    }


    public function update(Request $request, $id)
    {
         $grade = $this->gradeRepo->findOne($id);
         $data = $request->only('name' );



        $grade->update($data);
        return redirect(route('admin.grades.index'))->with('success', __('models.updated_successfully'));

    }


    public function destroy($id)
    {
         $grade = $this->gradeRepo->findOne($id)->delete();
        return redirect(route('admin.grades.index'))->with('success', __('models.deleted_successfully'));

    }
}
