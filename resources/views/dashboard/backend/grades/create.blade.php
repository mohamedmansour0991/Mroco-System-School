@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.add_grade') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.add_grade') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.grades.index') }}">{{ __('models.grades') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('models.add_grade') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.grades.store') }}" enctype="multipart/form-data" novalidate>

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
