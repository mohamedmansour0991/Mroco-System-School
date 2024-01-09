<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $userRepo ;

    public function __construct(UserRepository $userRepo)
    {
        $this->middleware('permission:users-read')->only(['index']);
        $this->middleware('permission:users-create')->only(['create', 'store']);
        $this->middleware('permission:users-update')->only(['edit', 'update']);
        $this->middleware('permission:users-delete')->only(['destroy']);
        $this->userRepo = $userRepo ;

    }


    public function get_users()
    {
        $users = $this->userRepo->query();
        return DataTables($users)

        ->editColumn('img', function ($user) {
            return '<img src="' . ($user->img ? asset('storage/'.$user->img) : asset('storage/users/1.png')) . '" alt="Image" class="me-3 rounded-circle avatar-md p-2 bg-light">';
        })
        ->editColumn('type' , function($user){
            return $user->type == 'email' ? '<span class="badge rounded-pill bg-success-subtle text-success">'.$user->type.'</span>' : '<span class="badge rounded-pill bg-danger-subtle text-success">'.$user->type.'</span>' ;
        })
        ->editColumn('created_at' , function($user){
            return $user->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.users.actions')

        ->rawColumns(['action' , 'img' , 'type'])
        ->make(true);

    }

    public function index()
    {
        return view('dashboard.backend.users.index');
    }




    public function edit($id)
    {
        return view('dashboard.backend.users.edit' , compact('admin'));

    }


    public function update(Request $request, $id)
    {
         $user = $this->userRepo->findOne($id);
         $data = $request->except('img' );

          if ($request->hasFile('img')) {

            Storage::delete($user->img);

            $data['img'] = $request->file('img')->store('users');

        } else {
            $data['img'] = $user->img;
        }

        $user->update($data);
        return redirect(route('admin.users.index'))->with('success', __('models.updated_successfully'));

    }


    public function destroy($id)
    {
         $user = $this->userRepo->findOne($id);

        if ($user->img) {
            Storage::delete($user->img);
        }

        $user->delete();

        return redirect(route('admin.users.index'))->with('success', __('models.deleted_successfully'));

    }


    public function changeActiveUser(Request $request){
        $user = $this->userRepo->findOne($request->id);

        if($request->is_active == 1){
           $is_active = 1 ;
        }else{
            $is_active = 0 ;
        }
        $user->update([
            'is_active'    => $is_active
        ]);


        return response()->json(['success' => __('models.status_update')]);
    }



}
