@extends('layouts.master')

@section('title','Order')

@section('content')
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Order</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->booking_date}}</td>
                        <td></td>
                        <td>
                            <!-- Call to action buttons -->
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <button class="btn btn-primary btn-sm rounded-0" type="submit" data-toggle="modal" data-target="#Delete" data-placement="top" title="Delete"><i class="fa fa-info"></i></button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{-- Pagination --}}
            <div class="d-flex justify-content-end">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
