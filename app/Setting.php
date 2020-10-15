<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['value_lang'];
    protected $casts = [
        'value'=> 'array',
    ];

    public function getValueLangAttribute($value)
    {
        if(app()->getLocale() == 'en')
            return $this->value['en'];
        return $this->value['ar'];
    }
    
}
