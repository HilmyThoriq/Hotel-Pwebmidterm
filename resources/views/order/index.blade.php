@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    {{ __('Order') }}
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
                        <th scope="col">Accept</th>
                        <th scope="col">Reject</th>
                        <th scope="col">Completed</th>

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

                    <form action="{{route('order.status',$order->id)}}" method="post">@csrf
                        <td>
                            <input name="status" type="submit" value="accepted" class="btn btn-primary btn-sm" >
                        </td>
                        <td>
                            <input name="status" type="submit" value="rejected" class="btn btn-danger btn-sm" >
                        </td>
                        <td>
                            <input name="status" type="submit" value="completed" class="btn btn-success btn-sm" >
                        </td>
                    </form>    
                    </tr>
                        @endforeach
                    </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
