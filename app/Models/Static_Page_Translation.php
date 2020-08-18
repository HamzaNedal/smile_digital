<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Static_Page_Translation extends Model
{
    use SoftDeletes;
    protected $table = 'static_pages_translation';
    protected $fillable = ['name','value','fk_static_pages','lang_code'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function parent()
    {
      return  $this->belongsTo(StaticPage::class,'fk_static_pages');
    }
}
