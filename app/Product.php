<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['name_lang', 'details_lang'];
    protected $casts = [
        'name'=> 'array',
        'details'=> 'array'
    ];

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
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
