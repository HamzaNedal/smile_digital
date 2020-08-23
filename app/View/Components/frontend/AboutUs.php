<?php

namespace App\View\Components\Frontend;

use App\Models\Static_Page_Translation;
use App\Models\StaticPage;
use Illuminate\View\Component;

class AboutUs extends Component
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
        return view('components.frontend.about-us');
    }

    public function aboutUs()
    {
        // dd(StaticPage::where(['key'=>'about_us'])->first()->translation->where('lang_code',session('lang'))->skip(1));
        return StaticPage::where(['key'=>'about_us'])->first()->translation->where('lang_code',session('lang'));
    }
}
