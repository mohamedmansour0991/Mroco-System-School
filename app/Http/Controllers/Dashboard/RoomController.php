<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\RoomRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RoomController extends Controller
{
    protected $roomRepo ;

    public function __construct(RoomRepository $roomRepo)
    {
        $this->middleware('permission:rooms-read')->only(['index']);
        $this->middleware('permission:rooms-create')->only(['create', 'store']);
        $this->middleware('permission:rooms-update')->only(['edit', 'update']);
        $this->middleware('permission:rooms-delete')->only(['destroy']);
        $this->roomRepo = $roomRepo ;

    }


    public function get_rooms()
    {
        $rooms = $this->roomRepo->query();
        return DataTables($rooms)
        ->editColumn('created_at' , function($room){
            return $room->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.rooms.actions')

        ->rawColumns(['action'])
        ->make(true);

    }

    public function index()
    {

         return view('dashboard.backend.rooms.index');
    }


    public function create()
    {
         return view('dashboard.backend.rooms.create');
    }


    public function store(Request $request)
    {

       $data = $request->all();
       $this->roomRepo->create($data);



        return redirect(route('admin.rooms.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $room = $this->roomRepo->findOne($id);

        return view('dashboard.backend.rooms.edit' , compact('room'));

    }


    public function update(Request $request, $id)
    {
         $room = $this->roomRepo->findOne($id);
         $data = $request->all();


        $room->update($data);
        return redirect(route('admin.rooms.index'))->with('success', __('models.updated_successfully'));

    }


    public function destroy($id)
    {
         $room = $this->roomRepo->findOne($id)->delete();
        return redirect(route('admin.rooms.index'))->with('success', __('models.deleted_successfully'));

    }
}
