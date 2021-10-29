@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            @if(count($errors)>0) 
            <div class="card mt-5">
                <div class="card-body">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                               <p>{{ $error }}</p> 
                            @endforeach
                        </div>  
                </div>
            </div>
            @endif 
            <div class="card">
                <div class="card-header">Edit Hotel</div>
                <form action="{{route('hotel.update',$hotel->id)}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name of Hotel</label>
                        <input type="text" class="form-control" name="name" placeholder="name of hotel" value="{{$hotel->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description of Hotel</label>
                        <textarea class="form-control" name="description">{{$hotel->description}}</textarea>                   
                    </div>
                    <div class="form-inline">
                        <label>Hotel Price(Rp.)</label>
                        <input type="text" name="per_day_hotel_price" placeholder="per day hotel price" value="{{$hotel->per_day_hotel_price}}">
                        <input type="text" name="per_week_hotel_price" placeholder="per week hotel price" value="{{$hotel->per_week_hotel_price}}"> 
                    </div>
                    <div class="form-group">
                        <label for="description">Category</label>
                        <select name="category">
                            <option value="Single Bed">Single Bed</option>
                            <option value="Double Bed">Double Bed</option>
                        </select>              
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image"class="form-control">
                        <img src="{{Storage::url($hotel->image)}}" width="80">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

