<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SettingRequest;
use App\Repositories\Sql\SettingRepository;
use App\Repositories\Sql\StaticPageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    protected $settingRepo , $staticRepo;

    public function __construct(SettingRepository $settingRepo , StaticPageRepository $staticRepo)
    {
        $this->middleware('permission:settings-read')->only(['index']);
        $this->middleware('permission:settings-update')->only(['edit', 'update']);
        $this->settingRepo     = $settingRepo ;
        $this->staticRepo      = $staticRepo ;
    }

    public function setting(){

        $setting = $this->settingRepo->findWhere(['type' => 'setting']);
        return view('dashboard.backend.setting.setting' , compact('setting'));
    }


    public function store_setting(Request $request){

        $setting = $this->settingRepo->findWhere(['type' => 'setting']);

        $data = $request->except('logo' , 'icon' , '1');

        if ($request->hasFile('logo')) {
            if( $setting->logo){
                Storage::delete($setting->logo);
            }
            $file = $request->file('logo');
            $fileName = uniqid('setting_') . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('settings', $fileName,'public');
            $data['logo'] = $filePath;

        } else {
            $data['logo'] = $setting->logo;
        }

        $setting->update($data);
        return redirect(route('admin.setting'))->with('success', __('models.updated_successfully'));

    }

    public function static(){

        $static = $this->staticRepo->findwhere(['type' => 'home']);
        return view('dashboard.backend.setting.static' , compact('static'));
    }

    public function update_static(Request $request){

        $static = $this->staticRepo->findwhere(['type' => 'home']);

        $data = $request->except('img1' , 'img2');

        if ($request->hasFile('img1')) {
            if( $static->img){
                Storage::delete($static->img1);
            }

            $file = $request->file('img1');
            $fileName = uniqid('statics_') . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('statics', $fileName,'public');
            $data['img1'] = $filePath;

        } else {
            $data['img1'] = $static->img1;
        }

        if ($request->hasFile('img2')) {
            if( $static->img){
                Storage::delete($static->img2);
            }

            $file = $request->file('img2');
            $fileName = uniqid('statics_') . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('statics', $fileName,'public');
            $data['img2'] = $filePath;

        } else {
            $data['img2'] = $static->img2;
        }

        $static->update($data);
        return redirect(route('admin.static'))->with('success', __('models.updated_successfully'));

    }

    public function static_page(){

        $static = $this->staticRepo->findwhere(['type' => 'rate']);
        return view('dashboard.backend.setting.static-page' , compact('static'));
    }

    public function update_static_page(Request $request){

        $static = $this->staticRepo->findwhere(['type' => 'rate']);

        $data = $request->only('title_ar' , 'title_en' , 'desc_ar' , 'desc_en');




        $static->update($data);
        return redirect(route('admin.static-page'))->with('success', __('models.updated_successfully'));

    }
}
