@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Package') }}</div>

                <div class="card-body">
                   @if(Auth::check())
                   <form action="{{route('order.store')}}" method="post">@csrf 
                       <div class="form-group">
                           <p>Name:{{auth()->user()->name}}</p>
                           <p>Email:{{auth()->user()->email}}</p>
                           <p>How many days: <input type="number" class="form-control" name="day_hotel" value="0"></p>
                           <p>How many weeks: <input type="number" class="form-control" name="week_hotel" value="0"></p>
                           <p><input type="hidden" name="hotel_id" value="{{$hotel->id}}"></p>
                           <p><input type="date" name="date" class="form-control"></p>
                           <p><textarea class="form-control" name="body"></textarea></p>
                           <p class="text-center">

                                <button class="btn btn-danger">Make Booking</button>

                            </p>
                     @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('errmessage'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('errmessage') }}
                        </div>
                    @endif

                       </div>
                   </form>
                    @else
                    <p><a href="">Please Login to Make Order</a></p>
                    @endif
                    {{ __('') }}
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hotel') }}</div>

                <div class="card-body">
                    <img src="{{Storage::url($hotel->image)}}" class="img-thumbnail" style="width:100%;" alt="">
                    <p><h3>{{$hotel->name}}</h3></p>
                    <p><h3>{{$hotel->description}}</h3></p>
                    <p>Per Day Hotel Price:Rp.{{$hotel->per_day_hotel_price}}</p>
                    <p>Per Week Hotel Price:Rp.{{$hotel->per_week_hotel_price}}</p> 
                        

                    {{ __('') }}
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item{
        font-size: 18px;
    }
    a.list-group-item:hover{
        background-color: green;
        color: #fff;
    }
    .card-header{
        background-color: green;
        color: #fff;
        font-size: 20px;
    }
</style>
@endsection
