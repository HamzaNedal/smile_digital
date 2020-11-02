<?php

namespace App\View\Components\frontend;

use App\Models\Slider_Translation;
use Illuminate\View\Component;

class Slider extends Component
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
        return view('components.frontend.slider');
    }

    public function sliders()
    {
        return Slider_Translation::where('lang_code',session('lang'))->get();
    }
}
