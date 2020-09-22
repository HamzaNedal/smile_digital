<?php

namespace App\View\Components\Frontend;

use App\Models\Service_Categories_Translation;
use App\Models\Services_Translation;
use App\Models\StaticPage;
use Illuminate\View\Component;

class Footer extends Component
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
        $staticPages = StaticPage::get();
        return view('components.frontend.footer');
    }

    public function staticPages(){
       return StaticPage::get();
    }
    public function ServiceCategories(){
        return Service_Categories_Translation::where('lang_code',session('lang'))->get();
     }
     public function places(){
        return StaticPage::where('key','place')->get();
     }
}
