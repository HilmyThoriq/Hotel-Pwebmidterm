<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|string|min:3|max:40',
            'description'=>'required|min:3|max:500',
            'per_day_hotel_price'=>'required|numeric',
            'per_week_hotel_price'=>'required|numeric',
            'category'=>'required',
            'image'=>'mimes:png,jpeg,jpg'
        ];
    }
}
