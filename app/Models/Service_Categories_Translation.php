<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service_Categories_Translation extends Model
{
    use SoftDeletes;
    protected $table = 'service_categories_translation';
    protected $fillable=['name','fk_service_categories','lang_code'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function parent()
    {
      return  $this->belongsTo(ServiceCategory::class,'fk_service_categories');
    }
    public function translation()
    {
      return  $this->hasMany(Services_Translation::class,'fk_category_translation');
    }
   
}
