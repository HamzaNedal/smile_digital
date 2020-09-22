<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;

class FormServiceModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $serviceTranslation;
    public function __construct($serviceTranslation)
    {
        $this->serviceTranslation =$serviceTranslation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.frontend.form-service-modal');
    }
}
