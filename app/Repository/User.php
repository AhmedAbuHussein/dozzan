<?php
namespace App\Repository;

use Carbon\Carbon;
use App\User as AppUser;
use Illuminate\Support\Str;

class User {
    
    public const KEY ='USER';
    /**
     * return all users order by column and 
     *
     * @param String $column
     * @return void
     */
    public function all(String $column)
    {
        $col = Str::upper($column);
        $key = $this->getKey("ALL.{$col}");
        return cache()->remember($key, Carbon::now()->addMinutes(120) ,function() use($column){
            return AppUser::orderBy($column, 'DESC')->get();
        });
    
    }

    private function getKey($id){
        return self::KEY.'.'.$id;
    }
}