<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AchievementCategoryTranslation extends Model
{
    use SoftDeletes;
    protected $table = 'achievement_category_translations';
    protected $fillable=['name','fk_achievement_category','lang_code'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function parent()
    {
      return  $this->belongsTo(AchievementCategory::class,'fk_achievement_category');
    }

}
