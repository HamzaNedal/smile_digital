<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider_Translation extends Model
{
    use SoftDeletes;
    protected $table = 'slider_translations';
    protected $fillable =['title','description','fk_slider','lang_code'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function parent()
    {
      return  $this->belongsTo(Slider::class,'fk_slider');
    }
}
