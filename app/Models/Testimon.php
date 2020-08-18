<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimon extends Model
{
    use SoftDeletes;
    protected $table = 'testimonies';
    protected $fillable =['image'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function translation()
    {
      return  $this->hasMany(Testimon_Translation::class,'fk_testimonies');
    }
}
