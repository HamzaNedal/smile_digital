<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achievements_Translation extends Model
{
    use SoftDeletes;
    protected $table = 'achievements_translation';
    protected $fillable=['name','fk_achievements','lang_code'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function achievement()
    {
      return  $this->belongsTo(Achievement::class,'fk_achievements');
    }
}
