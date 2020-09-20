<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;
    protected $table = 'sliders';
    protected $fillable =['background_image','image','link'];
    protected $casts = [
      'created_at'=>'date:Y-m-d h:m:s'
  ];
    public function translation()
    {
      return  $this->hasMany(Slider_Translation::class,'fk_slider');
    }
}
