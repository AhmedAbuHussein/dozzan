<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    protected $with = ['products'];
    protected $appends = ['name_lang', 'details_lang'];
    protected $casts = [
        'name'=> 'array',
        'details'=> 'array'
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function getNameLangAttribute($value)
    {
        if(app()->getLocale() == 'en')
            return $this->name['en'];
        return $this->name['ar'];
    }

    public function getDetailsLangAttribute($value)
    {
        if(app()->getLocale() == 'en')
            return $this->details['en'];
        return $this->details['ar'];
    }

}
