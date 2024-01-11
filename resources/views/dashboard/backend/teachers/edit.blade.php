@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.edit_teacher') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.edit_teacher') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.teachers.index') }}">{{ __('models.teachers') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('models.edit_teacher') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.teachers.update' , $teacher->id) }}" enctype="multipart/form-data" novalidate>

                    @method('PUT')
                    @csrf



                    {{--  name  --}}
                    <div class="col-md-6">
                        <label for="name" class="form-label">{{ __('models.name') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name' , $teacher->name) }}" id="name"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('name')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  age  --}}
                    <div class="col-md-6">
                        <label for="age" class="form-label">{{ __('models.age') }}</label>
                        <input type="text" class="form-control" name="age" value="{{ old('age' , $teacher->age) }}" id="age"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('age')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  subject  --}}
                    <div class="col-md-6">
                        <label for="subject" class="form-label">{{ __('models.subject') }}</label>
                        <input type="text" class="form-control" name="subject" value="{{ old('subject' , $teacher->subject) }}" id="subject"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('subject')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  address  --}}
                    <div class="col-md-6">
                        <label for="address" class="form-label">{{ __('models.address') }}</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address' , $teacher->address) }}" id="address"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('address')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  joinimg_date  --}}
                    <div class="col-md-6">
                        <label for="joinimg_date" class="form-label">{{ __('models.joinimg_date') }}</label>
                        <input type="date" class="form-control" name="joinimg_date" value="{{ old('joinimg_date') }}" id="joinimg_date"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('joinimg_date')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>



                    {{--  email  --}}
                    <div class="col-md-6">
                        <label for="email" class="form-label">{{ __('models.email') }}</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email' , $teacher->email) }}" id="email"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('email')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label" for="meta-description-input">{{ __('models.gender') }}</label>

                        <select class="form-control js-example-basic-multiple" name="gender" id="gender">
                            <option value="{{ $teacher->gender }}"  >{{ $teacher->gender }}</option>
                            <option value="" disabled> {{ __('models.gender') }} </option>
                            <option value="male"  >{{ __('models.male') }}</option>
                            <option value="female">{{ __('models.female') }}</option>

                        </select>
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
