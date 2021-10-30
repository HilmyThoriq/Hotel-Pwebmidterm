<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Order;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        if(!$request->category){
            $hotels = Hotel::latest()->get();
            return view('frontpage',compact('hotels'));
        }
            $hotels = Hotel::where('category',$request->category)->get();
            return view('frontpage',compact('hotels'));
    }

    public function show($id){
        $hotel = Hotel::find($id);
        return view('show',compact('hotel'));
    }

    public function store(Request $request){
        if($request->day_hotel == 0 && $request->week_hotel == 0){
            return back()->with('errmessage','Please book atleast 1 day');
        }
        if($request->day_hotel < 0 || $request->week_hotel < 0){
            return back()->with('errmessage','Book cannot be negative');
        }
        Order::create([
            'date' => $request->date,
            'user_id' => auth()->user()->id,
            'hotel_id' => $request->hotel_id,
            'day_hotel' => $request->day_hotel,
            'week_hotel' => $request->week_hotel,
            'body' => $request->body,
        ]);
        return back()->with('message', 'Your Booking is placed successfully');

    }
}
