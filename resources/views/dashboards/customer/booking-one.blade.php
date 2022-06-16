@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')
    <form action="{{route('customer.booking-one.post')}}" method="post">
        @csrf
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <section id="package">
                <h3 style="font-weight: 700">Choose Package</h3>

                <div class="content booking-package">
                    <div class="container text-center mt-4 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card p-3 mb-4">
                                    <div class="mt-5">
                                        <h3 class="heading">Package A</h3>
                                        <br>
                                        <h5 style="padding: 24px">Without Manpower</h5>
                                    </div>
                                    <input type="radio" class="btn-check btn-package" name="package" id="package-a"
                                           autocomplete="off"
                                           value="Package A"
                                           onclick="calculate('package','150')" {{ $order && $order->package == 'Package A' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-danger" for="package-a">Package A</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card p-3 mb-4">
                                    <div class="mt-5">
                                        <h3 class="heading">Package B</h3>
                                        <br>
                                        <h5 style="padding: 24px">1 Manpower</h5>
                                    </div>
                                    <input type="radio" class="btn-check btn-package" name="package" id="package-b"
                                           autocomplete="off" value="Package B"
                                        {{ $order && $order->package == 'Package B' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-danger" for="package-b">Package B</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card p-3 mb-4">
                                    <div class="mt-5">
                                        <h3 class="heading">Package C</h3>
                                        <br>
                                        <h5 style="padding: 24px">2 Manpower</h5>
                                    </div>
                                    <input type="radio" class="btn-check btn-package" name="package" id="package-c"
                                           autocomplete="off" value="Package C"
                                        {{ $order && $order->package == 'Package C' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-danger" for="package-c">Package C</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="transportation">
                <h3 style="font-weight: 700">Choose Transportation</h3>
                <div class="content booking-transportation">
                    <div class="container text-center mt-4 mb-3">
                        <div class="row gx-4">
                            <div class="col-auto">
                                <input type="radio" class="btn-check btn-transport btn-lg" name="vehicle_type"
                                       id="lorry-1tan"
                                       autocomplete="off" value="1 Ton Lorry"
                                    {{ $order && $order->vehicle_type == '1 Ton Lorry' ? 'checked' : '' }}>
                                <label class="btn btn-outline-danger btn-transport btn-lg" for="lorry-1tan">1 Ton
                                    Lorry</label>
                            </div>

                            <div class="col-auto">
                                <input type="radio" class="btn-check btn-transport btn-lg" name="vehicle_type"
                                       id="lorry-3tan"
                                       autocomplete="off" value="3 Ton Lorry"
                                    {{ $order && $order->vehicle_type == '3 Ton Lorry' ? 'checked' : '' }}>
                                <label class="btn btn-outline-danger btn-transport btn-lg" for="lorry-3tan">3 Ton
                                    Lorry</label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="actions">
                <div class="d-flex align-content-end justify-content-end">
                    <div class="mr-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">RM</span>
                            <input type="text" class="form-control" id="price" name="price"
                                   value="{{$order && $order->price}}" readonly style="background-color: white">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger"
                                style="color: white">Next <span><i class="fas fa-arrow-right"></i></span></button>
                    </div>
                </div>
            </section>
        </div>
    </form>
@endsection

@push('scripts')

    <script>

        $(document).ready(function () {
            calculate();
        });

        $(document).on('change', "input[name='package']", calculate);
        $(document).on('change', "input[name='vehicle_type']", calculate);

        function calculate() {
            const package = $("input[name='package']:checked").val(); // dapatkan checked value

            const vehicle_type = $("input[name='vehicle_type']:checked").val();

            var multiplier = 0;
            var transportMulti = 0;

            // Package
            if (package == 'Package A')
                multiplier = 150;

            else if (package == 'Package B')
                multiplier = 200;

            else if (package == 'Package C')
                multiplier = 250;

            // Transport
            if (vehicle_type == '1 Ton Lorry')
                transportMulti = 1

            else if (vehicle_type == '3 Ton Lorry')
                transportMulti = 2

            var price = multiplier * transportMulti;

            $('#price').val(price);

        }
    </script>

@endpush
