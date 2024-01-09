@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.add_role') }}
@endsection


@section('content')


<div class="col-xxl-6">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.add_role') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">{{ __('models.roles') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('models.add_role') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data" novalidate>

                    @csrf



                    {{--  name  --}}
                    <div class="col-md-6">
                        <label for="name" class="form-label">{{ __('models.name') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('name')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>


                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">

                                    </th>
                                    <th class="sort">{{ __('models.model') }}</th>
                                    <th class="sort">{{ __('models.permissions') }}</th></th>

                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                @foreach (config('laratrust_seeder.roles_structure.owner') as $model=>$permissions)
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td>{{__('models.'. $model)}}</td>
                                        <td>
                                            <div class="permissions">


                                              @foreach (explode(',' ,$permissions) as $permission)


                                                  <input type="checkbox" value="{{$model}}-{{config('laratrust_seeder.permissions_map')[$permission]}}" name="permissions[]"  class="{{$model}}" >
                                                  <label>{{__('models.' . $permission)}}</label>

                                              @endforeach

                                            </div>
                                        </td>


                                    </tr>

                                @endforeach
                            </tbody>
                        </table>

                    </div>














                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
</div>



@endsection


@section('js')
<script src="{{ asset('dashboard/assets/js/preview-image.js') }}"></script>

@endsection
