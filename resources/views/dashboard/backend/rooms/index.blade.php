@extends('dashboard.layouts.master')

@section('title')
   {{ __('models.rooms') }}
@endsection


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add, Edit & Remove</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">



                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('admin.rooms.create') }}" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i>{{ __('models.add_room') }}</a>
                                </div>
                            </div>








                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="rooms_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.code') }}</th>
                                    <th class="sort">{{ __('models.body') }}</th>
                                    <th class="sort">{{ __('models.floor') }}</th>
                                    <th class="sort">{{ __('models.hall_no') }}</th>
                                    <th class="sort">{{ __('models.capacity') }}</th>
                                    <th class="sort" >{{ __('models.action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">


                            </tbody>
                        </table>






                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

@section('js')
    <script>

        var table = $('#rooms_table').DataTable({
            processing     : true,
            serverSide     : true ,
            ordering       : false ,
            iDisplayLength : 10 ,
            lengthMenu     : [
                    [10 , 50 , 100 ,  -1] ,
                    [10 , 50 , 100 ,  'All'] ,
            ] ,
            ajax: "{{ route('admin.get-rooms') }}",
            columns: [


                {
                    data : 'code' ,
                    render: function (data, type, full, meta) {
                        return '<span class="badge bg-info">' + data + '</span>';
                    },
                } ,

                {
                    data : 'body' ,
                    render: function (data, type, full, meta) {
                        return '<span class="badge bg-info">' + data + '</span>';
                    },
                } ,


                {
                    data : 'floor' ,
                    render: function (data, type, full, meta) {
                        return '<span class="badge bg-info">' + data + '</span>';
                    },
                } ,


                {
                    data : 'hall_no' ,
                    render: function (data, type, full, meta) {
                        return '<span class="badge bg-info">' + data + '</span>';
                    },
                } ,


                {
                    data : 'capacity' ,
                    render: function (data, type, full, meta) {
                        return '<span class="badge bg-info">' + data + '</span>';
                    },
                } ,








                {
                    data : 'action' ,
                    searchable: false,
                } ,

            ]

        });



    </script>
@endsection
