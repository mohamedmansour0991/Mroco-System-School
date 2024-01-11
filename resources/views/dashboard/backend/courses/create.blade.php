@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.add_course') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.add_course') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.courses.index') }}">{{ __('models.courses') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('models.add_course') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data" novalidate>

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



                    {{--  price  --}}
                    <div class="col-md-6">
                        <label for="price" class="form-label">{{ __('models.price') }}</label>
                        <input type="number" class="form-control" name="price" value="{{ old('price') }}" id="price"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('price')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  rate  --}}
                    <div class="col-md-6">
                        <label for="rate" class="form-label">{{ __('models.rate') }}</label>
                        <input type="number" class="form-control" name="rate" value="{{ old('rate') }}" id="rate"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('rate')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  students  --}}
                    <div class="col-md-6">
                        <label for="students" class="form-label">{{ __('models.students') }}</label>
                        <input type="number" class="form-control" name="students" value="{{ old('students') }}" id="students"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('students')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>


                    <div class="col-lg-6">
                        <label class="form-label" for="meta-description-input">{{ __('models.teachers') }}</label>

                        <select class="form-control js-example-basic-multiple" name="teacher_id" id="teacher_id">
                            <option value="" disabled> {{ __('models.teachers') }} </option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"  >{{ $teacher->name }}</option>
                            @endforeach

                        </select>
                    </div>

                        {{--  desc  --}}
                        <div class="col-lg-6">
                            <label class="form-label" for="meta-description-input"> Description</label>
                            <textarea class="form-control" name="desc" id="meta-description-input" placeholder="Enter Product Arabic description" rows="3">{{ old('desc') }}</textarea>
                            @error('desc')
                                <span class="text-danger">
                                    <small class="errorTxt">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-6 col-12 mb-3">
                            <label for="formFile" class="form-label">{{ __('models.img') }}</label>
                            <input class="form-control image" type="file" id="formFile"
                                name="img" required>

                            @error('img')
                                <span class="text-danger">
                                    <small class="errorTxt">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group prev">
                            <img src="" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
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
