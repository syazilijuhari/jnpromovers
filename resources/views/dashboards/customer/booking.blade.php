@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')
<div class="container-fluid p-md-0">
    <div class="col-md-6">
    <h3 style="font-weight: 700">Select Date & Time</h3>
    <div class="form-group">
        <div class="input-group date" id="bookingdatetime" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#bookingdatetime">
            <div class="input-group-append" data-target="#bookingdatetime" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('#bookingdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
        });
    </script>
@endpush
