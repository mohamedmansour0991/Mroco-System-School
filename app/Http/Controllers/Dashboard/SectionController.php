<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\GradeRepository;
use App\Repositories\Sql\SectionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SectionController extends Controller
{
    protected $sectionRepo , $gradeRepo;

    public function __construct(SectionRepository $sectionRepo , GradeRepository $gradeRepo)
    {
        $this->middleware('permission:sections-read')->only(['index']);
        $this->middleware('permission:sections-create')->only(['create', 'store']);
        $this->middleware('permission:sections-update')->only(['edit', 'update']);
        $this->middleware('permission:sections-delete')->only(['destroy']);
        $this->sectionRepo = $sectionRepo ;
        $this->gradeRepo   = $gradeRepo ;

    }


    public function get_sections()
    {
        $sections = $this->sectionRepo->query();
        return DataTables($sections)
        ->editColumn('created_at' , function($section){
            return $section->created_at->format('y-m-d');
        })
        ->editColumn('grade' , function($section){
            return $section->grade->name;
        })
        ->editColumn('class_room' , function($section){
            return $section->classroom->name;
        })
        ->addColumn('action', 'dashboard.backend.sections.actions')

        ->rawColumns(['action'])
        ->make(true);

    }

    public function index()
    {

         return view('dashboard.backend.sections.index');
    }


    public function create()
    {
        $grades = $this->gradeRepo->getAll();
        return view('dashboard.backend.sections.create' , compact('grades'));
    }


    public function store(Request $request)
    {

       $data = $request->all();
       $this->sectionRepo->create($data);
       return redirect(route('admin.sections.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $section = $this->sectionRepo->findOne($id);
        $grades = $this->gradeRepo->getAll();

        return view('dashboard.backend.sections.edit' , compact('section' , 'grades'));

    }


    public function update(Request $request, $id)
    {
        $section = $this->sectionRepo->findOne($id);
        $data = $request->all();

        $section->update($data);
        return redirect(route('admin.sections.index'))->with('success', __('models.updated_successfully'));

    }


    public function destroy($id)
    {
         $section = $this->sectionRepo->findOne($id)->delete();
        return redirect(route('admin.sections.index'))->with('success', __('models.deleted_successfully'));

    }
}
