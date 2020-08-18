<?php

namespace App\View\Components\frontend;

use App\Models\Testimon_Translation;
use Illuminate\View\Component;

class Testimonies extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.frontend.testimonies');
    }
    public function testimonies()
    {
        return Testimon_Translation::where(['lang_code'=>session('lang')])->get();
    }
}
