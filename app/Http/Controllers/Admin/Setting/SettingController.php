<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Setting as AppSetting;
use Facades\App\Repository\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::all();
        return view('admin.setting.index', compact('setting'));
    }

    public function edit(AppSetting $setting, $type)
    {
        return view('admin.setting.edit', compact('setting', 'type'));
    }

    public function update(Request $request,AppSetting $setting, $type)
    {
        if($type == 'image'){
            $this->validate($request, ['file'=>'required|image']);
            $name = $setting->value;
            if(is_file(public_path($name))){
                unlink(public_path($name));
            }
            $name = time().'.'.$request->file('file')->getClientOriginalExtension();
            $request->file('file')->storeAs('/images', $name);
            $name = 'images/'.$name;
            $value = ['en'=>$name, 'ar'=>$name];
            $setting->update(['value'=> $value]);
        }else if($type == 'text'){
            $this->validate($request, ['value'=>'required|array']);
            $setting->update(['value'=> $request->value]);
        }else if($type == 'words'){
            $this->validate($request, ['value'=>'required|array']);
            $en = implode(':', $request->value['en']);
            $ar = implode(':', $request->value['ar']);
            $value= ['en'=> $en, 'ar'=> $ar];
            $setting->update(['value'=> $value]);
        }else if($type == 'social'){
            $this->validate($request, ['value'=>'required|array']);
            $value = ['en'=>$request->value, 'ar'=> $request->value];
            $setting->update(['value'=> $value]);
        }else if($type == 'shipping'){
            $this->validate($request, ['value'=>'required|numeric']);
            $setting->update(['value'=> ['en'=>$request->value, 'ar'=>$request->value]]);
        }else if($type == 'footer'){
            $this->validate($request, ['value'=>'required|string']);

            $setting->update(['value'=> ['en'=>$request->value, 'ar'=>$request->value]]);
        }
        
        cache()->forget('SETTING');
        return redirect()->route('admin.setting.index')->with(['message'=>'Setting Update Successfully', 'icon'=> 'success']);
    }
}
