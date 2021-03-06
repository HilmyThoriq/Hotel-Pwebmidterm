<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::paginate(3);
       return view('hotel.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelStoreRequest $request)
    {
        $path = $request->image->store('public/hotel');
        Hotel::create([
            'name' => $request->name,
            'description' => $request->description,
            'per_day_hotel_price'=>$request->per_day_hotel_price,
            'per_week_hotel_price'=>$request->per_week_hotel_price,
            'category'=> $request->category,
            'image'=> $path,
        ]);
        return redirect()->route('hotel.index')->with('message','Hotel added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $hotel = Hotel::find($id);
        return view('hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelUpdateRequest $request, $id)
    {
        $hotel = Hotel::find($id);
        if($request->has('image')){
            $path = $request->image->storage('public/hotel');
        }else{
            $path = $hotel->image;
        }
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->per_day_hotel_price = $request->per_day_hotel_price;
        $hotel->per_week_hotel_price = $request->per_week_hotel_price;
        $hotel->category = $request->category;
        $hotel->image = $path;
        $hotel->save();
        return redirect()->route('hotel.index')->with('message','Hotel update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hotel::find($id)->delete();
        return redirect()->route('hotel.index')->with('message','Hotel delete successfully!');

    }
}
