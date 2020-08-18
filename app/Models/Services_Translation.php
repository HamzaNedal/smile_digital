<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services_Translation extends Model
{
    use SoftDeletes;
    protected $table = 'services_translation';
    protected $fillable =['name','description','fk_category_translation','lang_code','fk_services'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function category()
    {
      return  $this->belongsTo(Service_Categories_Translation::class,'fk_category_translation');
    }
    public function parent()
    {
      return  $this->belongsTo(Service::class,'fk_services');
    }
}
