@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Hotel</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">D.price</th>
      <th scope="col">W.price</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      @foreach($hotels as $key=> $hotel)
    <tr>
      <th scope="row">{{$key+1}}</th>
        <td><img src="{{Storage::url($hotel->image)}}" width="80"></td>
        <td>{{$hotel->name}}</td>
        <td>{{$hotel->description}}</td>
        <td>{{$hotel->category}}</td>
        <td>{{$hotel->per_day_hotel_price}}</td>
        <td>{{$hotel->per_week_hotel_price}}</td>
        <td><button class="btn btn-primary">Edit</button></td>
        <td><button class="btn btn-danger">Delete</button></td>
    </tr>
      @endforeach
   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
