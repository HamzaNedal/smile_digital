<?php

namespace App\View\Components\frontend;

use App\Models\Service_Categories_Translation;
use Illuminate\View\Component;

class ModalCategories extends Component
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
        return view('components.frontend.modal-categories');
    }

    public function categories()
    {
        return Service_Categories_Translation::where('lang_code',session('lang'))->get();
    }
}
