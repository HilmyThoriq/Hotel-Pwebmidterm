@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                    {{ __('Your Orders') }}
                    
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">User</th>
                        <th scope="col">Phone/Email</th>
                        <th scope="col">Date</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Day Hotel</th>
                        <th scope="col">Week Hotel</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->user->email}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->hotel->name}}</td>
                        <td>{{$order->day_hotel}}</td>
                        <td>{{$order->week_hotel}}</td>
                        <td>{{$order->body}}</td>
                        <td>{{$order->status}}</td>

                        
                    </tr>
                        @endforeach
                    </tbody>
                    </table>
                    
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
