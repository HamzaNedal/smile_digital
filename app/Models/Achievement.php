<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achievement extends Model
{
  use SoftDeletes;
  protected $table = 'achievements';
  protected $fillable = ['image', 'link', 'desctiption', 'fk_achievement_category'];
  protected $casts = [
    'created_at' => 'date:Y-m-d h:m:s'
  ];
  public function translation()
  {
    return  $this->hasMany(Achievements_Translation::class, 'fk_achievements');
  }
  public function parent_achievement_category()
  {
    return  $this->belongsTo(AchievementCategory::class, 'fk_achievement_category');
  }
}
