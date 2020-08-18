<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategory extends Model
{
    use SoftDeletes;
    protected $table = 'service_categories';
    protected $fillable=['image'];
    protected $casts = [
      'created_at'=>'date:Y-m-d h:m:s'
  ];
    public function translation()
    {
      return  $this->hasMany(Service_Categories_Translation::class,'fk_service_categories');
    }
}
