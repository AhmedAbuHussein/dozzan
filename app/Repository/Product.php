<?php
namespace App\Repository;

use Carbon\Carbon;
use App\Product as AppProduct;
use Illuminate\Support\Str;

class Product {
    
    public const KEY ='PRODUCT';
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
            return AppProduct::with('category')->orderBy($column, 'DESC')->get();
        });
    
    }

    private function getKey($id){
        return self::KEY.'.'.$id;
    }
}