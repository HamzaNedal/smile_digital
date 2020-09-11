<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticPage extends Model
{
    use SoftDeletes;
    protected $table = 'static_pages';
    protected $fillable = ['key','status','value','file'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function translation()
    {
      return  $this->hasMany(Static_Page_Translation::class,'fk_static_pages');
    }
}
