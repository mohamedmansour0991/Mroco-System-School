@extends('dashboard.layouts.master')

@section('title')
   {{ __('models.users') }}
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


                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="user_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.users') }}</th>
                                    <th class="sort">{{ __('models.img') }}</th>
                                    <th class="sort">{{ __('models.email') }}</th>
                                    <th class="sort">{{ __('models.type') }}</th>
                                    <th class="sort">{{ __('models.is_active') }}</th>
                                    <th class="sort">{{ __('models.created_at') }}</th>
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

        $(function() {
            $(document).on('change', '.is_active', function() {
                var is_active = $(this).prop('checked') ? 1 : 0; // Simplified the is_active check
                var id = $(this).data('id');
                console.log("is_active: " + is_active); // Check if is_active and id are correct
                console.log("ID: " + id);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('admin.changeActiveUser') }}",
                    data: {
                        'is_active': is_active,
                        'id': id
                    },
                    success: function(data) {
                        alert(data.success);
                    }
                });
            });
        });


        $('#user_table').DataTable({
        processing     : true,
        serverSide     : true ,
        ordering       : false ,
        iDisplayLength : 10 ,
        lengthMenu     : [
                 [10 , 50 , 100 ,  -1] ,
                 [10 , 50 , 100 ,  'All'] ,
        ] ,
        ajax: "{{ route('admin.get-users') }}",
        columns: [


            {
                data : 'name' ,
                render: function (data, type, full, meta) {
                    return '<span class="badge bg-info-subtle text-info badge-border">' + data + '</span>';
                },
            } ,

            {
                data: 'img',
                searchable: false,

            },

            {
                data: 'email',
                render: function (data, type, full, meta) {
                    return '<span class="badge bg-info-subtle text-info badge-border">' + data + '</span>';
                },
            } ,

            {
                data : 'type' ,
            } ,

            {
                data: 'is_active',
                render: function (data, type, full, meta) {
                    var switchHtml = '<div class="form-check form-switch">' +
                        '<input class="form-check-input is_active" type="checkbox" name="is_active" data-id="'+full.id+'" id="switch_' + full.id + '" ' + (data == 1 ? 'checked' : '') + '>' +
                        '<label class="form-check-label" for="switch_' + full.id + '"></label>' +
                        '</div>';
                    return switchHtml;
                },
                searchable: false,
            },

            {
                data: 'created_at',
                render: function (data, type, full, meta) {
                    return '<span class="badge bg-info-subtle text-dark badge-border">' + data + '</span>';
                },
                searchable: false
            } ,

            {
                data : 'action' ,
                searchable: false,
            } ,






        ]
        });
    </script>
@endsection
