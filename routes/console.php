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

    $firstCollectionSlot = CollectionTimeSlot::find(1);
    $firstCollectionSlot->order_quantity = 0;
    $firstCollectionSlot->save();

    $secondCollectionSlot = CollectionTimeSlot::find(2);
    $secondCollectionSlot->order_quantity = 0;
    $secondCollectionSlot->save();

    $thirdCollectionSlot = CollectionTimeSlot::find(3);
    $thirdCollectionSlot->order_quantity = 0;
    $thirdCollectionSlot->save();

})->purpose('Update collection slots\' order quantity back to 0.');
