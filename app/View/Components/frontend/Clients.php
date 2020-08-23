<?php

namespace App\View\Components\Frontend;

use App\Models\Client;
use App\Models\Client_Translation;
use Illuminate\View\Component;

class Clients extends Component
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
        return view('components.frontend.clients');
    }
    public function clients()
    {
        return Client_Translation::where(['lang_code'=>session('lang')])->get();
    }
}
