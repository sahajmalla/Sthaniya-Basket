<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CollectionDay;
use Illuminate\Support\Carbon;
use App\Models\CollectionTimeSlot;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class CheckoutController extends Controller
{
    public function index(Request $request) {

        $allSlotsFull = $this->checkAllCollectionSlotsAvailability($request);
        $wedSlotsFull = $this->checkWednesdaySlotsAvailability($request);
        $thurSlotsFull = $this->checkThursdaySlotsAvailability($request);
        $friSlotsFull = $this->checkFridaySlotsAvailability($request);
        $availableSlotsForWed = $this->getNoOfWedSlotsAvailability();
        $availableSlotsForThu = $this->getNoOfThurSlotsAvailability();
        $availableSlotsForFri = $this->getNoOfFridaySlotsAvailability();
        $wedLast2SlotsFull = $this->wedLast2SlotsFull();
        $wedLastSlotFull = $this->wedLastSlotFull();
        $thuLast2SlotsFull = $this->thuLast2SlotsFull();
        $thuLastSlotFull = $this->thuLastSlotFull();
        $friLast2SlotsFull = $this->friLast2SlotsFull();
        $friLastSlotFull = $this->friLastSlotFull();

        // Current date and time:
        $currentDateTime = Carbon::now(); // Should be just now()

        $firstTimeSlot = Carbon::parse('10:00:00')->addDays(1); // Should be 1
        $secondTimeSlot = Carbon::parse('13:00:00')->addDays(1);
        $thirdTimeSlot = Carbon::parse('16:00:00')->addDays(1);

        if($currentDateTime->format('l') == "Friday" || 
            ($currentDateTime->format('l') == "Thursday" && $currentDateTime > Carbon::parse('16:00:00'))
          ) {

            // If the current day is friday or if it is thursday and it's after 4pm disable checkout feature.

            $request->session()->flash('friday', 'Orders cannot be made from every Thursday 4pm till
            the end of every Friday. Please try again from Saturday onwards.');

            return redirect()->route('home');

        }elseif ($allSlotsFull) {

            return redirect()->route('home');

        }else if ($thurSlotsFull && $friSlotsFull && 
        ($currentDateTime->format('l') == "Wednesday" || ($currentDateTime->format('l') == "Tuesday" 
        && $currentDateTime > Carbon::parse('10:00:00' ) && $wedLast2SlotsFull))) {

            // If thursday and friday slots are full and if it is either wednesday or tuesday
            // with first time slot over and last 2 slots for wednesday full.

            $request->session()->flash('slotsFull', 'All of the collection slots are full. Please try 
            again this coming Saturday.');

            return redirect()->route('home');

        }else if ($thurSlotsFull && $friSlotsFull && 
        ($currentDateTime->format('l') == "Wednesday" || ($currentDateTime->format('l') == "Tuesday" 
        && $currentDateTime > Carbon::parse('13:00:00' ) && $wedLastSlotFull))) {

            // If thursday and friday slots are full and if it is either wednesday or tuesday
            // with first and second time slot over and last slot for wednesday full.

            $request->session()->flash('slotsFull', 'All of the collection slots are full. Please try 
            again this coming Saturday.');

            return redirect()->route('home');

        }else if ($thurSlotsFull && $friSlotsFull && 
            ($currentDateTime->format('l') == "Wednesday" || ($currentDateTime->format('l') == "Tuesday" 
            && $currentDateTime > Carbon::parse('16:00:00' )))) {

            // If Thursday and Friday's 3 slots are full and it's Wednesday or tuesday after 4pm.

            $request->session()->flash('slotsFull', 'All of the collection slots are full. Please try 
            again this coming Saturday.');

            return redirect()->route('home');

        }else if ($friSlotsFull && ($currentDateTime->format('l') == "Thursday" 
        || ($currentDateTime->format('l') == "Wednesday" 
        && $currentDateTime > Carbon::parse('10:00:00') && $thuLast2SlotsFull))) {

            // If friday's 3 slots are full and it's thursday or wednesday after 10am with thursday's
            // last 2 slots full.

            $request->session()->flash('slotsFull', 'All of the collection slots are full. Please try 
            again this coming Saturday.');

            return redirect()->route('home');

        }else if ($friSlotsFull && ($currentDateTime->format('l') == "Thursday" 
        || ($currentDateTime->format('l') == "Wednesday" 
        && $currentDateTime > Carbon::parse('13:00:00') && $thuLastSlotFull))) {

            // If friday's 3 slots are full and it's thursday or wednesday after 1pm with thursday's
            // last slot full.

            $request->session()->flash('slotsFull', 'All of the collection slots are full. Please try 
            again this coming Saturday.');

            return redirect()->route('home');

        }else if ($friSlotsFull && ($currentDateTime->format('l') == "Thursday" 
        || ($currentDateTime->format('l') == "Wednesday" 
        && $currentDateTime > Carbon::parse('16:00:00')))) {

            // If friday's 3 slots are full and it's thursday or wednesday after 4pm.

            $request->session()->flash('slotsFull', 'All of the collection slots are full. Please try 
            again this coming Saturday.');

            return redirect()->route('home');

        }else if ($currentDateTime->format('l') == "Thursday" && $friLast2SlotsFull && 
        $currentDateTime > Carbon::parse('10:00:00')) {

            // If it is thursday, first time slot is up and last 2 time slots are full.

            $request->session()->flash('slotsFull', 'All of the collection slots are full. Please try 
            again this coming Saturday.');

            return redirect()->route('home');

        }else if ($currentDateTime->format('l') == "Thursday" && $friLastSlotFull && 
        $currentDateTime > Carbon::parse('13:00:00')){

            // If it is thursday, first time slot is up and last time slot are full.

            $request->session()->flash('slotsFull', 'All of the collection slots are full. Please try 
            again this coming Saturday.');

            return redirect()->route('home');

        }

        $total_price = 0.0;
        $total_items_quantity = 0;

        // Retrive products related to user from cart.
        $cartAndProductRecords = DB::table('products')
        ->join('carts', function ($join) {
            $join->on('carts.product_id', '=', 'products.id')
                ->where('carts.customer_id', '=', auth()->user()->customers->first()->id);
        })
        ->get();

        foreach ($cartAndProductRecords as $cartAndProductRecord) {
            $total_price += ($cartAndProductRecord->price * $cartAndProductRecord->product_quantity);
            $total_items_quantity += $cartAndProductRecord->product_quantity;
        }

        $total_price_string_2dp = number_format($total_price, 2);

        return view('checkout', [
            "cartAndProductRecords" => $cartAndProductRecords,
            'total_price' => $total_price_string_2dp,
            'total_items_quantity' => $total_items_quantity,
            'currentDateTime' => $currentDateTime,
            'firstTimeSlot' => $firstTimeSlot,
            'secondTimeSlot' => $secondTimeSlot,
            'thirdTimeSlot' => $thirdTimeSlot,
            'wedSlotsFull' => $wedSlotsFull,
            'thurSlotsFull' => $thurSlotsFull,
            'friSlotsFull' => $friSlotsFull,
            'availableSlotsForWed' => $availableSlotsForWed,
            'availableSlotsForThu' => $availableSlotsForThu,
            'availableSlotsForFri' => $availableSlotsForFri,
            'wedLast2SlotsFull' => $wedLast2SlotsFull,
            'wedLastSlotFull' => $wedLastSlotFull,
            'thuLast2SlotsFull' => $thuLast2SlotsFull,
            'thuLastSlotFull' => $thuLastSlotFull,
            'friLast2SlotsFull' => $friLast2SlotsFull,
            'friLastSlotFull' => $friLastSlotFull,
        ]);
    }


    public function store(Request $request, float $totalPrice, int $totalQuantity, 
                            int $totalItems, Carbon $currentDateTime) { 

        $orderDescription = "A total of ".$totalItems." "
            .Str::plural('item', $totalItems)." with a total quantity of ".$totalQuantity
            ." and a total price of €".number_format((float)$totalPrice, 2, '.', '').".";
        
        // Creating a checkout record through the customer:
        $order = auth()->user()->customers->first()->checkouts()->create([
                    'order_total' => $totalPrice,
                    'order_quantity' => $totalQuantity,
                    'total_items' => $totalItems,
                    'payment_type' => $request->payment,
                    'collection_time' => $request->collectionTime,
                    'collection_day' => $request->collectionDay,
                    'order_description' => $orderDescription,
                ]); 

        // Increment the collection slot's order quantity:
        $this->updateCollectionSlotOrderQuantity($request->collectionDay, $request->collectionTime);

        if ($request->payment == 'PayPal') {

            return redirect()->route('paypal.checkout', $order->id);

        }

        return redirect()->route('order');

    }


    public function updateCollectionSlotOrderQuantity(String $collectionDay, String $collectionSlot) {

        $day = CollectionDay::get()->where('day', $collectionDay);
        
        $slot = CollectionTimeSlot::get()->where('slot_time', $collectionSlot)
                                    ->where('collection_day_id', $day->first()->id);

        $slot->first()->order_quantity += 1;
        $slot->first()->save();
        
    }   

    
    public function checkAllCollectionSlotsAvailability(Request $request) {

        // If all of the collections slots already have 20 products, deny the customer from
        // proceeding to checkout.

        $totalSlotsQuantity = (int) DB::table('collection_time_slots')->sum('order_quantity');

        // If all slots are full, redirect to home with error message.
        if ($totalSlotsQuantity == 180) {
            
            // Collection slot full message.

            $request->session()->flash('slotsFull', 'All of the collection slots are full. Please try 
            again this coming Saturday.');

            return true;

        }else {
            return false;
        }

    }


    public function checkWednesdaySlotsAvailability(Request $request) {
    
        $day = CollectionDay::find(1);
        $totalSlotsQuantity = (int) CollectionTimeSlot::where('collection_day_id', $day->id)
                                ->sum('order_quantity');

        if ($totalSlotsQuantity == 60) {
            return true;
        }else {
            return false;
        }

    }


    public function checkThursdaySlotsAvailability(Request $request) {

        $day = CollectionDay::find(2);
        $totalSlotsQuantity = (int) CollectionTimeSlot::where('collection_day_id', $day->id)
                                ->sum('order_quantity');

        if ($totalSlotsQuantity == 60) {
            return true;
        }else {
            return false;
        }
    
    }


    public function checkFridaySlotsAvailability(Request $request) {

        $day = CollectionDay::find(3);
        $totalSlotsQuantity = (int) CollectionTimeSlot::where('collection_day_id', $day->id)
                                ->sum('order_quantity');

        if ($totalSlotsQuantity == 60) {
            return true;
        }else {
            return false;
        }

    }


    public function getNoOfWedSlotsAvailability() {

        $day = CollectionDay::find(1);
        $noOfFreeSlots = CollectionTimeSlot::get()->where('collection_day_id', $day->id);

        return $noOfFreeSlots;
        
    }


    public function getNoOfThurSlotsAvailability() {

        $day = CollectionDay::find(2);
        $noOfFreeSlots = CollectionTimeSlot::get()->where('collection_day_id', $day->id);

        return $noOfFreeSlots;

    }


    public function getNoOfFridaySlotsAvailability() {

        $day = CollectionDay::find(3);
        $noOfFreeSlots = CollectionTimeSlot::get()->where('collection_day_id', $day->id);

        return $noOfFreeSlots;

    }


    public function wedLast2SlotsFull() {

        $day = CollectionDay::find(1);
        $noOfFreeSlots = CollectionTimeSlot::get()->where('collection_day_id', $day->id)
                        ->where('slot_time', '!=', '10-13');

        $last2SlotsFull = 0;

        foreach ($noOfFreeSlots as $slot) {

            if ($slot->order_quantity == 20) {

                $last2SlotsFull++;

            }

        }

        if ($last2SlotsFull == 2) {
            return true;
        }else {
            return false;
        }

    }


    public function wedLastSlotFull() {

        $day = CollectionDay::find(1);
        $slot = CollectionTimeSlot::get()->where('collection_day_id', $day->id)
                        ->where('slot_time', '=', '16-19')->first();


        if ($slot->order_quantity == 20) {

            return true;

        }else {

            return false;

        }

    }


    public function thuLast2SlotsFull() {

        $day = CollectionDay::find(2);
        $noOfFreeSlots = CollectionTimeSlot::get()->where('collection_day_id', $day->id)
                        ->where('slot_time', '!=', '10-13');

        $last2SlotsFull = 0;

        foreach ($noOfFreeSlots as $slot) {

            if ($slot->order_quantity == 20) {

                $last2SlotsFull++;

            }

        }

        if ($last2SlotsFull == 2) {
            return true;
        }else {
            return false;
        }

    }


    public function thuLastSlotFull() {

        $day = CollectionDay::find(2);
        $slot = CollectionTimeSlot::get()->where('collection_day_id', $day->id)
                        ->where('slot_time', '=', '16-19')->first();


        if ($slot->order_quantity == 20) {

            return true;

        }else {

            return false;

        }

    }

    
    public function friLast2SlotsFull() {

        $day = CollectionDay::find(3);
        $noOfFreeSlots = CollectionTimeSlot::get()->where('collection_day_id', $day->id)
                        ->where('slot_time', '!=', '10-13');

        $last2SlotsFull = 0;

        foreach ($noOfFreeSlots as $slot) {

            if ($slot->order_quantity == 20) {

                $last2SlotsFull++;

            }

        }

        if ($last2SlotsFull == 2) {
            return true;
        }else {
            return false;
        }

    }


    public function friLastSlotFull() {

        $day = CollectionDay::find(3);
        $slot = CollectionTimeSlot::get()->where('collection_day_id', $day->id)
                        ->where('slot_time', '=', '16-19')->first();


        if ($slot->order_quantity == 20) {

            return true;

        }else {

            return false;

        }

    }

}   
