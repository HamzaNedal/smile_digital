<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequests extends Model
{
    use SoftDeletes;
    protected $table = 'form_services';

    protected $fillable = [
        'name', 'country', 'phone_country_code', 'phone_no', 'email', 'service_id', 'short_description', 'file', 'status'
    ];
    protected $casts = [
        'created_at' => 'date:Y-m-d h:m:s'
    ];

    public function parent()
    {
      return  $this->belongsTo(Service::class,'service_id');
    }
}
