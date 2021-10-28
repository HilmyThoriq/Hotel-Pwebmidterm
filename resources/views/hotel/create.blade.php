@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('hotel.index')}}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{route('hotel.create')}}" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
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
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hotel</div>
                <form action="{{route('hotel.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name of Hotel</label>
                        <input type="text" class="form-control" name="name" placeholder="name of hotel">
                    </div>
                    <div class="form-group">
                        <label for="description">Description of Hotel</label>
                        <textarea class="form-control" name="description"></textarea>                   
                    </div>
                    <div class="form-inline">
                        <label>Hotel Price(Rp.)</label>
                        <input type="number" name="per_day_hotel_price" placeholder="per day hotel price">
                        <input type="number" name="per_week_hotel_price" placeholder="per week hotel price"> 
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

