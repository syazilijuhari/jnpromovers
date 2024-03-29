@extends('layouts.master')

@section('title','Dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$orders->count()}}</h3>
                    <p>Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route("admin.order.index") }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$customers->count()}}</h3>
                    <p>Customers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route("admin.customer.index") }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$employees->count()}}</h3>
                    <p>Employee</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route("admin.employee.index") }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$services->count()}}</h3>
                    <p>Services</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route("admin.infodetails.index") }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    {{--    <div class="col-lg-12">--}}
    <div class="card">
        <div class="card-header border-0 bg-cyan m-0">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Orders Report</h3>
            </div>
        </div>

        <div class="card-body">
            <div class="position-relative mb-4">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="report" style="display: block; height: 290px; width: 100%;"
                        class="chartjs-render-monitor"></canvas>
            </div>
        </div>
        {{--        </div>--}}
    </div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"
            integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" defer>
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            /*
                ===========
                LINE CHART
                ===========
                */
            const applicationChartCanvas = $('#report').get(0).getContext('2d')
            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                elements: {
                    line: {
                        tension: 0.4
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                        title: {
                            display: true,
                            text: "Date"
                        },
                        grid: {
                            display: false,
                        }
                    },
                    y: {
                        stacked: true,
                        title: {
                            display: true,
                            text: "Total Order(s)"
                        },
                        grid: {
                            display: false,
                        }
                    }
                }
            }
            new Chart(applicationChartCanvas, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($orderDate->keys()) !!},
                    // labels: ["January", "February","March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [
                        {
                            label: 'Order Received',
                            backgroundColor: '#4bc0c0',
                            borderColor: 'rgba(210, 214, 222, 1)',
                            fill: true,
                            data: {!! json_encode($orderDate->values()) !!},
                            // data: 100
                        },

                    ]
                },
                options: areaChartOptions
            });
        });
    </script>
@endpush
