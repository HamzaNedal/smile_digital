<?php

namespace App\Services;

use App\Models\Static_Page_Translation;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ModelServices {
    public function update($input,$fk_static_pages)
    {
        foreach ($input as $key => $value) {
            Static_Page_Translation::where(['fk_static_pages'=>$fk_static_pages,'lang_code'=>$key])->update([
                'name'=>$value['title'],
                'value' => $value['description'],
            ]);
    }
    }

}