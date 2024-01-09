@extends('dashboard.layouts.master')

@section('title')
   {{ __('models.courses') }}
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
                                    <a href="{{ route('admin.courses.create') }}" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i>{{ __('models.add_course') }}</a>
                                </div>
                            </div>








                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="courses_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.name') }}</th>
                                    <th class="sort">{{ __('models.img') }}</th>
                                    <th class="sort">{{ __('models.teachers') }}</th>
                                    <th class="sort">{{ __('models.price') }}</th>
                                    <th class="sort">{{ __('models.rate') }}</th>
                                    <th class="sort">{{ __('models.students') }}</th>
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

        var table = $('#courses_table').DataTable({
            processing     : true,
            serverSide     : true ,
            ordering       : false ,
            iDisplayLength : 10 ,
            lengthMenu     : [
                    [10 , 50 , 100 ,  -1] ,
                    [10 , 50 , 100 ,  'All'] ,
            ] ,
            ajax: "{{ route('admin.get-courses') }}",
            columns: [


                {
                    data : 'name' ,
                    render: function (data, type, full, meta) {
                        return '<span class="badge bg-info">' + data + '</span>';
                    },
                } ,
                {
                    data: 'img',
                    render: function (data, type, full, meta) {
                        return '<img src="' + '{{ asset("storage/") }}' + '/' + data + '" alt="Image" class="me-3 rounded-circle avatar-md p-2 bg-light" >';
                    } ,
                    searchable: false,

                },
                {
                    data : 'teacher' ,
                    render: function (data, type, full, meta) {
                        return '<span class="badge bg-info">' + data + '</span>';
                    },
                } ,
                {
                    data : 'price' ,
                    render: function (data, type, full, meta) {
                        return '<span class="badge bg-info">' + data + '</span>';
                    },
                } ,
                {
                    data : 'rate' ,
                    render: function (data, type, full, meta) {
                        return '<span class="badge bg-info">' + data + '</span>';
                    },
                } ,
                {
                    data : 'students' ,
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
