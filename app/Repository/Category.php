<?php
namespace App\Repository;

use Carbon\Carbon;
use App\Category as AppCategory;
use Illuminate\Support\Str;

class Category {
    
    public const KEY ='CATEGORY';
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
        return cache()->remember($key, Carbon::now()->addMinutes(60), function() use($column){
            return AppCategory::orderBy($column, 'ASC')->get();
        });
    
    }

    private function getKey($id){
        return self::KEY.'.'.$id;
    }
}