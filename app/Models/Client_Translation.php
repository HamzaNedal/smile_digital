<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client_Translation extends Model
{
    use SoftDeletes;
    protected $table = 'clients_translation';
    protected $fillable=['name','fk_clients','lang_code'];
    protected $casts = [
      'created_at'=>'date:Y-m-d h:m:s'
  ];
  public function parent()
  {
    return  $this->belongsTo(Client::class,'fk_clients');
  }
}
