<?php

namespace App\Observers;

use App\Models\ServiceCategory as ServiceCategory;

class CategoryObserver
{
    /**
     * Handle the service category "created" event.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return void
     */
    public function created(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Handle the service category "updated" event.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return void
     */
    public function updated(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Handle the service category "deleted" event.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return void
     */
    public function deleted(ServiceCategory $serviceCategory)
    {
        if($serviceCategory->translation[0]->translation->isNotEmpty()){
            $serviceCategory->translation[0]->translation[0]->parent->translation()->delete();
            $serviceCategory->translation[0]->translation[0]->parent()->delete();
        }
        $serviceCategory->translation()->delete();
    }

    /**
     * Handle the service category "restored" event.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return void
     */
    public function restored(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Handle the service category "force deleted" event.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return void
     */
    public function forceDeleted(ServiceCategory $serviceCategory)
    {
        //
    }
}
