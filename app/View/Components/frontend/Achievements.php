<?php

namespace App\View\Components\Frontend;

use App\Models\Achievement;
use App\Models\AchievementCategory;
use App\Models\Achievements_Translation;
use Illuminate\View\Component;

class Achievements extends Component
{
    protected $achievementCategory ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->achievementCategory = AchievementCategory::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.frontend.achievements',[
            'categories'=>$this->achievementCategory
        ]);
    }

    // public function achievements()
    // {
    //     return Achievement::get();
    // }
}
