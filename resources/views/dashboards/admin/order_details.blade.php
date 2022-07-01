@extends('layouts.master')

@section('title', 'Order Details')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @elseif($message = Session::get('failed'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="card">
        <section id="details">
            <div class="form-group row m-2">
                <label for="datetime" class="col-sm-2 col-form-label" style="font-weight: bold">Date</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="datetime"
                           value="{{ \Carbon\Carbon::parse($orders->booking_datetime)->format('Y-m-d') }}">
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="time" class="col-sm-2 col-form-label" style="font-weight: bold">Time</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="time"
                           value="{{ \Carbon\Carbon::parse($orders->booking_datetime)->format('h:i') }}">
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="address_from" class="col-sm-2 col-form-label"
                       style="font-weight: bold">Pickup</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="address_from"
                           value="{{$orders->address_from}}">
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="address_to" class="col-sm-2 col-form-label"
                       style="font-weight: bold">Dropoff</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="address_to"
                           value="{{$orders->address_to}}">
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="package" class="col-sm-2 col-form-label" style="font-weight: bold">Package</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="package"
                           value="{{$orders->package}}">
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="vehicle_type" class="col-sm-2 col-form-label"
                       style="font-weight: bold">Lorry</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="vehicle_type"
                           value="{{$orders->vehicle_type}}">
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="extra_service" class="col-sm-2 col-form-label"
                       style="font-weight: bold">Service(s)</label>
                <div class="col-sm-10">
                    @foreach($orders->extra_service as $item)
                        <input type="text" readonly class="form-control-plaintext" id="extra_service"
                               value="{{$item}}">
                    @endforeach
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="note" class="col-sm-2 col-form-label" style="font-weight: bold">Note</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="note"
                           value="{{$orders->note}}">
                </div>
            </div>

            <div class="form-group row m-2">
                <label for="photo" class="col-sm-2 col-form-label" style="font-weight: bold">Photo(s)</label>
                <div class="col-sm-10">
                    @if( count($orders['photo']) > 1)
                        @foreach($orders['photo'] as $key => $photo)
                            <img src="{{ asset('img/'.$photo) }}" alt="" width="150px" height="100px">
                        @endforeach
                    @else
                        <img src="{{ asset('img/'.$orders['photo'][0]) }}" width="150px" height="100px">
                    @endif
                </div>
            </div>

            <div class="form-group row m-2">
                <label for="note" class="col-sm-2 col-form-label" style="font-weight: bold">Price</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="price"
                           value="RM {{$orders->price}}">
                </div>
            </div>
        </section>
        <section id="actions" class="m-3">
            <div>
                <button type="submit" class="btn btn-danger float-right" data-toggle="modal"
                        data-target="#staticBackdrop"
                        style="color: white">Assign
                </button>
            </div>
            {{--Assign Modal--}}
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="staticBackdropLabel">Choose Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{route('admin.assign',$orders->order_id)}}" method="post">
                            @csrf
                            <div class="modal-body mt-0">
                                <div class="mt-3">
                                    <div class="p-2 rounded checkbox-form">
                                        @foreach($employees as $employee)
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox"
                                                       value="{{$employee->user_id}}" name="employee[]"
                                                       id="flexCheckDefault-1">
                                                <label class=" employee form-check-label" for="flexCheckDefault-1">
                                                    {{$employee->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-danger btn-block btn-sm">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@push('scripts')
    <script>

    </script>
@endpush
