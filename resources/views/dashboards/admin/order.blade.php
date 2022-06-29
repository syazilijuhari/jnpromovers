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
                    <th>Date Created</th>
                    <th>Package</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</td>
                        <td>{{$order->package}}</td>
                        <td>
                            <!-- Call to action buttons -->
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip"
                                       data-placement="top" href="{{route('admin.order.show', $order->order_id)}}"
                                       title="Details"><i class="fa fa-info"></i></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <a href="{{route('admin.order.export')}}" class="btn btn-sm btn-primary float-left" style="margin-top:5px">Export to Excel <i class="fa fa-file-export"></i></a>
            {{-- Pagination --}}
            <div class="d-flex justify-content-end">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
