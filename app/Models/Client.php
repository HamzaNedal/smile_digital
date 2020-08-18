<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $table = 'clients';
    protected $fillable=['image','link'];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function translation()
    {
      return  $this->hasMany(Client_Translation::class,'fk_clients');
    }
}
