<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AchievementCategory extends Model
{
    use SoftDeletes;
    protected $table = 'achievement_categories';
    protected $fillable=['image'];
    protected $casts = [
      'created_at'=>'date:Y-m-d h:m:s'
  ];
    public function translation()
    {
      return  $this->hasMany(AchievementCategoryTranslation::class,'fk_achievement_category');
    }
    public function achievements()
    {
      return  $this->hasMany(Achievement::class, 'fk_achievement_category');
    }
}
