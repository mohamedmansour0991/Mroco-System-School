<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Role;
use App\Repositories\Sql\AdminRepository;
use App\Repositories\Sql\RoleRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminController extends Controller
{

    protected $adminRepo , $roleRepo;

    public function __construct(AdminRepository $adminRepo , RoleRepository $roleRepo )
    {
        $this->middleware('permission:admins-read')->only(['index']);
        $this->middleware('permission:admins-create')->only(['create', 'store']);
        $this->middleware('permission:admins-update')->only(['edit', 'update']);
        $this->middleware('permission:admins-delete')->only(['destroy']);
        $this->adminRepo = $adminRepo ;
        $this->roleRepo = $roleRepo ;
    }

    public function get_admins()
    {
        $admins = $this->adminRepo->query();
        return DataTables($admins)

        ->editColumn('roles', function ($admin) {
            return $admin->roles->map(function ($admin_roles) {
                return '<span class="badge rounded-pill bg-info">' . $admin_roles->name . '</span><br>';
            })->implode('');
        })

        ->editColumn('created_at' , function($admin){
            return $admin->created_at->format('y-m-d');

        })
        ->addColumn('action', 'dashboard.backend.admins.actions')

        ->rawColumns(['action' , 'roles'])
        ->make(true);

    }


    public function index()
    {
        $roles = $this->roleRepo->getAll();
        return view('dashboard.backend.admins.index' , compact('roles'));
    }


    public function create()
    {
        $roles = $this->roleRepo->getAll();
        return view('dashboard.backend.admins.create' , compact('roles') );
    }


    public function store(AdminRequest $request)
    {

        $data = $request->except('password' , 'img' , 'email_verified_at' , 'remember_token' , 'role_id');

         $data['password'] = bcrypt($request->password) ;
         $data['email_verified_at'] =  now() ;
         $data['remember_token'] = Str::random(10) ;

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('admins');
        }

        $admin =$this->adminRepo->create($data);

        $admin->syncRoles(['admin' => $request->role_id]);

        return redirect(route('admin.admins.index'))->with('success', __('models.added_successfully'));

    }


    public function edit($id)
    {
        $admin = $this->adminRepo->findOne($id);
        $roles = $this->roleRepo->getAll();

        return view('dashboard.backend.admins.edit' , compact('admin' , 'roles'));
    }


    public function update(AdminRequest $request, $id)
    {
        $admin = $this->adminRepo->findOne($id);
        $data = $request->except('password' , 'img' , 'role_id');

        if(request()->has('password') && $request->password != null){
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('img')) {

            Storage::delete($admin->img);

            $data['img'] = $request->file('img')->store('admins');

        } else {
            $data['img'] = $admin->img;
        }

        $admin->update($data);
        $admin->syncRoles(['admin' => $request->role_id]);


        return redirect(route('admin.admins.index'))->with('success', __('models.added_successfully'));
    }


    public function destroy($id)
    {


        $admin = $this->adminRepo->findOne($id);

        if ($admin->img) {
            Storage::delete($admin->img);
        }

        $admin->delete();

        return redirect(route('admin.admins.index'))->with('success', __('models.deleted_successfully'));
    }

    public function profile()
    {
        $admin = Auth::user();
        return view('dashboard.profile' , compact('admin'));
    }

    public function updateProfile(AdminRequest $request)
    {
        $admin = Auth::user();

        $data = $request->except('password' , 'img' );

        if(request()->has('password') && $request->password != null){
            $request_data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('img')) {

            Storage::delete($admin->img);

            $data['img'] = $request->file('img')->store('admins');

        } else {
            $data['img'] = $admin->img;
        }

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }

}


