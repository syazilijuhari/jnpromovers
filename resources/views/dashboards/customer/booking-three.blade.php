@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')
    <form action="{{route('customer.booking-three.post')}}" method="post">
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
            <section id="services">
                <h3 style="font-weight: 700">Additional Services</h3>
                <div class="content booking-services">
                    <div class="container text-center mt-4 mb-3">
                        <div class="row gx-4">
                            <div class="col-auto">
                                <input type="checkbox" class="btn-check btn-services btn-lg" name="extra_service[]"
                                       id="dismantle"
                                       autocomplete="off"
                                       value="Dismantle" {{($order->extra_service) == 'Dismantle' ? 'checked' : ''}}>
                                <label class="btn btn-outline-danger btn-services btn-lg"
                                       for="dismantle">Dismantle</label>
                            </div>

                            <div class="col-auto">
                                <input type="checkbox" class="btn-check btn-services btn-lg" name="extra_service[]"
                                       id="wrapping"
                                       autocomplete="off"
                                       value="Wrapping" {{($order->extra_service) == 'Wrapping' ? 'checked' : ''}}>
                                <label class="btn btn-outline-danger btn-services btn-lg"
                                       for="wrapping">Wrapping</label>
                            </div>

                            <div class="col-auto">
                                <input type="checkbox" class="btn-check btn-services btn-lg" name="extra_service[]"
                                       id="boxes"
                                       autocomplete="off"
                                       value="Boxes" {{($order->extra_service) == 'Boxes' ? 'checked' : ''}}>
                                <label class="btn btn-outline-danger btn-services btn-lg" for="boxes">Boxes</label>
                            </div>
                            <div class="col-auto">
                                <input type="checkbox" class="btn-check btn-services btn-lg" name="extra_service[]"
                                       id="manpower"
                                       autocomplete="off"
                                       value="Boxes" {{($order->extra_service) == 'Manpower' ? 'checked' : ''}}>
                                <label class="btn btn-outline-danger btn-services btn-lg" for="manpower">Manpower</label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="notes">
                <h3 style="font-weight: 700">Notes</h3>
                <div class="content booking-notes">
                    <div class="container col-md-6 mt-4 mb-3 ml-0">
                        <textarea class="form-control" name="note" rows="3">{{$order->note}}</textarea>
                    </div>
                </div>
            </section>

            <section id="photos">
                <h3 style="font-weight: 700">Upload photo(s) of your item(s)</h3>
                <div class="container col-md-6 mt-4 mb-3 ml-0">
                    <div class="content booking-photos">
                        <input class="form-control" type="file" name="photo" accept="images/*" id="inputImage" multiple value="{{$order->photo}}">
                    </div>
                </div>
            </section>

            <section id="actions" class="m-3">
                <div class="d-flex align-content-end justify-content-between">
                    <div>
                        <a href="{{route('customer.booking-two')}}" type="submit" class="btn btn-danger"
                           style="color: white"><span><i class="fas fa-arrow-left"></i> Back</span></a>
                    </div>
                    <div class="d-flex">
                        <div class="mr-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">RM</span>
                                <input type="text" class="form-control" id="price" name="price" value="{{$order->price}}" readonly style="background-color: white">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger"
                                    style="color: white">Next <span><i class="fas fa-arrow-right"></i></span></button>
                        </div>
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

        $(document).on('change', "input[name='extra_service']", calculate);

        function calculate() {
            const service = $("input[name='extra_service']:checked").val(); // dapatkan checked value

            var multiplier = 0;

            // Package
            if (service == 'Dismantle')
                multiplier = 150;

            else if (service == 'Wrapping')
                multiplier = 150;

            else if (service == 'Boxes')
                multiplier = 20;


            let price = multiplier + {{$order->price}};
            price = price.toFixed(2)

            $('#price').val(price);
        }
    </script>

@endpush
