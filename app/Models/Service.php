<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $table = 'services';
    protected $casts = [
      'created_at'=>'date:Y-m-d h:m:s'
  ];
    public function translation()
    {
      return  $this->hasMany(Services_Translation::class,'fk_services');
    }
}
