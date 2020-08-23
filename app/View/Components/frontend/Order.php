<?php

namespace App\View\Components\Frontend;

use App\Models\StaticPage;
use Illuminate\View\Component;

class Order extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {       
        return view('components.frontend.order');
    }
    public function staticPages(){
        return StaticPage::where('key','order')->first()->translation->where('lang_code',session('lang'))->first();
     }
}
