@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Package') }}</div>

                <div class="card-body">
                    
                        <form action="{{route('frontpage')}}" method="get">
                        <button href="/" class="btn btn-secondary">Back</button>
                        <input type="submit" value="Single Bed" name="category"class="list-group-item list-group-item-action"></input>
                        <input type="submit" value="Double Bed" name="category"class="list-group-item list-group-item-action"></input>
                        </form>
                        <h1 class="text-center">{{count($hotels)}} hotel</h1>
                                   {{ __('') }}
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hotel') }}</div>

                <div class="card-body">
                    <div class="row"> 
                        @forelse($hotels as $hotel)
                        <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc;">
                            <img src="{{Storage::url($hotel->image)}}" class="img-thumbnail" style="width:100%;" alt="">
                            <p>{{$hotel->name}}</p>
                            <p>{{$hotel->description}}</p>
                            <a href="{{route('hotel.show',$hotel->id)}}">
                                <button class="btn btn-danger mb-1">Book Now!</button>
                            </a>
                        </div>
                        @empty
                        <p>no hotels to show</p>
                        @endforelse
                        
                        
                    </div>

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
