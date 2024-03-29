@extends('layouts.master')

@section('title','Info Details')

@section('content')
    {{--Message--}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Service</h3>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->title}}</td>
                        <td>{{$service->category}}</td>
                        <td>
                            <!-- Call to action buttons -->
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" href="{{route('admin.infodetails.edit', $service->id)}}" title="Edit"><i class="fa fa-edit"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <button class="btn btn-danger btn-sm rounded-0 delete-service" type="submit" data-id="{{$service->id}}" data-toggle="modal" data-target="#Delete" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <a href="{{route('admin.infodetails.create')}}" class="btn btn-sm btn-info float-left" style="margin-top:5px">Add New Service</a>
            {{-- Pagination --}}
            <div class="d-flex justify-content-end">
                {{ $services->links() }}
            </div>
        </div>
    </div>
    {{-- DELETE confirmation modal --}}
    <div class="modal fade" id="Delete" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="DeleteModalLabel">Delete Customer Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this?
                    <span id="del_id"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form action="{{ route('admin.infodetails.delete')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="oldid" id="oldid">
                        <button type="submit" id="btnDelete" value="delete" name="type"
                                class="btn btn-danger shadow-none">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).on("click", ".delete-service", function () {
            var serviceId = $(this).data('id');
            $('#oldid').val(serviceId);
            $('#del_id').text(serviceId);
            console.log(serviceId)
        });
    </script>
@endpush
