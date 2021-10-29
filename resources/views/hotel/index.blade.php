@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Hotel
                  <a href="{{route('hotel.create')}}">
                    <button class="btn btn-success" style="float: right">Add Hotel</button>
                  </a>
                  </div>
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
      @if(count($hotels)>0)
      @foreach($hotels as $key=> $hotel)
    <tr>
      <th scope="row">{{$key+1}}</th>
        <td><img src="{{Storage::url($hotel->image)}}" width="80"></td>
        <td>{{$hotel->name}}</td>
        <td>{{$hotel->description}}</td>
        <td>{{$hotel->category}}</td>
        <td>{{$hotel->per_day_hotel_price}}</td>
        <td>{{$hotel->per_week_hotel_price}}</td>
        <td><a href="{{route('hotel.edit',$hotel->id)}}"><button class="btn btn-primary">Edit</button></a></td>
        <td><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $hotel->id }}">Delete</button></td>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal{{ $hotel->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <form action="{{route('hotel.destroy', $hotel->id)}}" method="post">@csrf
              @method('DELETE')
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Deleting hotel</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      Are you sure? 
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
                  </div>
              </div>
              </form>
              </div>
    </tr>
      @endforeach
      
      @else 
      <p>No hotel to show</p>
      @endif

  </tbody>
                    </table>
                    {{ $hotels->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
