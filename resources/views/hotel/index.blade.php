@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="" class="list-group-item list-group-item-action">View</a>
                        <a href="" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hotel</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name of Hotel</label>
                        <input type="text" ckass="form-control" name="name" placeholder="name of hotel">
                    </div>
                    <div class="form-group">
                        <label for="description">Description of Hotel</label>
                        <textarea class="form-control" name="description"></textarea>                   
                    </div>
                    <div class="form-inline">
                        <label>Hotel Price(Rp.)</label>
                        <input type="number" class="form-control" placeholder="per day hotel price">
                        <input type="number" class="form-control" placeholder="per week hotel price"> 
                    </div>
                    <div class="form-group">
                        <label for="description">Category</label>
                        <select class="form-control">
                            <option value="Single Bed">Single Bed</option>
                            <option value="Double Bed">Double Bed</option>
                        </select>              
                    </div>
                    <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control">
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

