<?php
namespace App\Repository;

use Carbon\Carbon;
use App\Setting as AppSetting;
use Illuminate\Support\Str;

class Setting {
    
    public const KEY ='SETTING';
    /**
     * return all users order by column and 
     *
     * @param String $column
     * @return void
     */
    public function all()
    {
        $key = $this->getKey();
        return cache()->remember($key, Carbon::now()->addMinutes(60), function(){
            return AppSetting::get();
        });
    
    }

    private function getKey($id=null){
        if(!$id)
            return self::KEY;
        return self::KEY.'.'.$id;
    }
}