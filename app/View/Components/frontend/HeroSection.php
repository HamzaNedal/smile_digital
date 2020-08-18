<?php

namespace App\View\Components\frontend;

use App\Models\StaticPage;
use Illuminate\View\Component;

class HeroSection extends Component
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
        return view('components.frontend.hero-section');
    }
    public function staticPages(){
        
        return StaticPage::where('key','company')->first()->translation->where('lang_code',session('lang'))->first();
     }
}
