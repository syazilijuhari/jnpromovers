@extends('layouts.master')

@section('title','Customer')

@section('content')
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Customer</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Phone No</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->user_id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
