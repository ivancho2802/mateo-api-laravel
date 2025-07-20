<?php

namespace App\Observers;

use App\Models\MMqr;


class MMqrObserver
{
    /**
     * Handle the MMqr "created" event.
     *
     * @param  \App\Models\MMqr  $mMqr
     * @return void
     */
    public function created(MMqr $mMqr)
    {
        //
    }

    /**
     * Handle the MMqr "updated" event.
     *
     * @param  \App\Models\MMqr  $mMqr
     * @return void
     */
    public function updated(MMqr $mMqr)
    {
        //
    }

    /**
     * Handle the MMqr "deleted" event.
     *
     * @param  \App\Models\MMqr  $mMqr
     * @return void
     */
    public function deleted(MMqr $mMqr)
    {
        //
    }

    /**
     * Handle the MMqr "restored" event.
     *
     * @param  \App\Models\MMqr  $mMqr
     * @return void
     */
    public function restored(MMqr $mMqr)
    {
        //
    }

    /**
     * Handle the MMqr "force deleted" event.
     *
     * @param  \App\Models\MMqr  $mMqr
     * @return void
     */
    public function forceDeleted(MMqr $mMqr)
    {
        //
    }

    /**
     * 
     */
    public function creating(MMqr $mMqr)
    {
        $mMqr->DEPARTMENT = $mMqr->formatDepartment($mMqr->DEPARTMENT);
        $mMqr->SEXO =  ucfirst(strtolower($mMqr->SEXO));

        return $mMqr;
    }

    public function updating(MMqr $mMqr)
    {
        $mMqr->DEPARTMENT = $mMqr->formatDepartment($mMqr->DEPARTMENT);
        $mMqr->SEXO =  ucfirst(strtolower($mMqr->SEXO));

        return $mMqr;
    }
}
