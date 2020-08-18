<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimon_Translation extends Model
{
    use SoftDeletes;
    protected $table = 'testimonies_translation';
    protected $fillable =['name','description','fk_testimonies','lang_code'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function parent()
    {
      return  $this->belongsTo(Testimon::class,'fk_testimonies');
    }
}
