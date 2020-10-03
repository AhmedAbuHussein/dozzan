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
            $setting->update(['value'=> $name]);
        }else if($type == 'text'){
            $this->validate($request, ['value'=>'required|string']);
            $setting->update(['value'=> $request->value]);
        }else if($type == 'words'){
            $this->validate($request, ['value'=>'required|array']);
            $value = implode(':', $request->value);
            $setting->update(['value'=> $value]);
        }else if($type == 'social'){
            $this->validate($request, ['value'=>'required|array']);
            $setting->update(['value'=> $request->value]);
        }
        
        cache()->forget('SETTING');
        return view('admin.setting.edit', compact('setting', 'type'));
    }
}