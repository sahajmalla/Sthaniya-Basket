<?php

use App\Models\User;
use App\Mail\OrderSuccessful;
use App\Models\CollectionTimeSlot;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('collectionSlotsUpdate', function () {

    $collectionSlots = CollectionTimeSlot::get();
    foreach ($collectionSlots as $collectionSlot) {
        $collectionSlot->order_quantity = 0;
        $collectionSlot->save();
    }

})->purpose('Update collection slots\' order quantity back to 0.');
