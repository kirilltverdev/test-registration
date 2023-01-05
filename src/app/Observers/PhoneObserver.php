<?php

namespace App\Observers;

use App\Models\Phone;
use Illuminate\Support\Facades\Log;

class PhoneObserver
{
    /**
     * Handle the Phone "created" event.
     *
     * @param \App\Models\Phone $phone
     * @return void
     */
    public function created(Phone $phone)
    {
        Log::info("$phone->phone Created successfully (Here will be sms trigger)");

    }

    /**
     * Handle the Phone "updated" event.
     *
     * @param \App\Models\Phone $phone
     * @return void
     */
    public function updated(Phone $phone)
    {
        //
    }

    /**
     * Handle the Phone "deleted" event.
     *
     * @param \App\Models\Phone $phone
     * @return void
     */
    public function deleted(Phone $phone)
    {
        //
    }

    /**
     * Handle the Phone "restored" event.
     *
     * @param \App\Models\Phone $phone
     * @return void
     */
    public function restored(Phone $phone)
    {
        //
    }

    /**
     * Handle the Phone "force deleted" event.
     *
     * @param \App\Models\Phone $phone
     * @return void
     */
    public function forceDeleted(Phone $phone)
    {
        //
    }
}
