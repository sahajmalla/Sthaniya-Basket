<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CollectionDay;

class HomeController extends Controller
{
    public function index(Request $request) {

        $collectionDays = CollectionDay::get();

        if ($collectionDays->count() == 0) {

            CollectionDay::create([
                'day'=>'Wednesday'
            ]);
            CollectionDay::create([
                'day'=>'Thursday'
            ]);
            CollectionDay::create([
                'day'=>'Friday'
            ]);
    

            $wednesday=CollectionDay::find(1);
            $thursday=CollectionDay::find(2);
            $friday=CollectionDay::find(3);
    
            $wednesday->collectionTimeSlots()->create([
                'slot_time' => '10-13',
                'order_quantity' => 0,
            ]);
            $wednesday->collectionTimeSlots()->create([
                'slot_time' => '13-16',
                'order_quantity' => 0,
            ]);
            $wednesday->collectionTimeSlots()->create([
                'slot_time' => '16-19',
                'order_quantity' => 0,
            ]);
    
            $thursday->collectionTimeSlots()->create([
                'slot_time' => '10-13',
                'order_quantity' => 0,
            ]);
            $thursday->collectionTimeSlots()->create([
                'slot_time' => '13-16',
                'order_quantity' => 0,
            ]);
            $thursday->collectionTimeSlots()->create([
                'slot_time' => '16-19',
                'order_quantity' => 0,
            ]);
    
            $friday->collectionTimeSlots()->create([
                'slot_time' => '10-13',
                'order_quantity' => 0,
            ]);
            $friday->collectionTimeSlots()->create([
                'slot_time' => '13-16',
                'order_quantity' => 0,
            ]);
            $friday->collectionTimeSlots()->create([
                'slot_time' => '16-19',
                'order_quantity' => 0,
            ]);

        }

        // $products = Product::orderByRaw('dbms_random.value')->paginate(20); //for oracle
        $products = Product::inRandomOrder()->paginate(20); //for mysql
        if($request->sort=='latest'){
            $products = Product::latest()->paginate(20); 
        }

        if($request->sort=='high-price'){
            $products = Product::orderBy('price','DESC')->paginate(20); 
        }
        if($request->sort=='low-price'){
            $products = Product::orderBy('price')->paginate(20); 
        }
        //todo
        // if($request->sort=='popularity'){
        //     $products = Product::latest()->paginate(20); 
        // }
// dd($products);
        return view('home', [
            'products' => $products,
        ]);
    }
}
