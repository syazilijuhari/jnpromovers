@extends('layouts.viewer')

@section('title', 'Invoice')

@section('content')
        <div class="card">
            <div class="card-body">
                <div class="container mb-5 mt-3" >
                    <div class="row d-flex align-items-baseline">
                        <div class="col-xl-3 float-end">
                            <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                    class="fas fa-print text-primary" onclick="printDiv()"></i> Print</a>
                        </div>
                        <hr>
                    </div>

                    <div class="container" id="print">
                        <div class="col-md-12">
                            <div class="text-center">
                                <img src="{{asset('img/jnpro-logo.png')}}" alt="JN Pro Logo" class="img-fluid img"
                                     style="width: 170px; height: 230px">
                                <h5 style="font-weight: bold; color: #ED1E24">JN Pro Movers</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-8">
                                <ul class="list-unstyled">
                                    <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$order->name}}</span>
                                    </li>
                                    <li class="text-muted">Email: <span style="color:#5d9fc5 ;">{{$order->email}}</span>
                                    </li>
                                    <li class="text-muted">Phone No: <span
                                            style="color:#5d9fc5 ;">{{$order->phone}}</span></li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <ul class="list-unstyled">
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold">Order ID: </span>{{$order->order_id}}
                                    </li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold">Creation Date: </span>{{$order->created_at}}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row my-2 mx-1 justify-content-center">
                            <table class="table table-striped table-borderless">
                                <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Package</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Total Price</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$order->order_id}}</td>
                                    <td>{{$order->package}}</td>
                                    <td>{{\Carbon\Carbon::parse($order->booking_datetime)->format('Y-m-d') }}</td>
                                    <td>{{\Carbon\Carbon::parse($order->booking_datetime)->format('h:i') }}</td>
                                    <td>RM {{$order->price}}</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Thank you for your order</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')

    <script>
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

@endpush
