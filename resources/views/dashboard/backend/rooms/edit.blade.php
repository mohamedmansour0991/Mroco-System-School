@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.edit_room') }}
@endsection


@section('content')


<div class="col-xxl-6">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.edit_room') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.rooms.index') }}">{{ __('models.rooms') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('models.edit_room') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.rooms.update' , $room->id) }}" enctype="multipart/form-data" novalidate>

                    @method('PUT')
                    @csrf




                    {{--  code  --}}
                    <div class="col-md-6">
                        <label for="code" class="form-label">{{ __('models.code') }}</label>
                        <input type="text" class="form-control" name="code" value="{{ old('code' , $room->code) }}" id="code"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('code')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  body  --}}
                    <div class="col-md-6">
                        <label for="body" class="form-label">{{ __('models.body') }}</label>
                        <input type="text" class="form-control" name="body" value="{{ old('body' , $room->body) }}" id="body"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('body')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  floor  --}}
                    <div class="col-md-6">
                        <label for="floor" class="form-label">{{ __('models.floor') }}</label>
                        <input type="text" class="form-control" name="floor" value="{{ old('floor' , $room->floor) }}" id="floor"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('floor')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  hall_no  --}}
                    <div class="col-md-6">
                        <label for="hall_no" class="form-label">{{ __('models.hall_no') }}</label>
                        <input type="number" class="form-control" name="hall_no" value="{{ old('hall_no' , $room->hall_no) }}" id="hall_no"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('hall_no')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  capacity  --}}
                    <div class="col-md-6">
                        <label for="capacity" class="form-label">{{ __('models.capacity') }}</label>
                        <input type="number" class="form-control" name="capacity" value="{{ old('capacity' , $room->capacity) }}" id="capacity"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('capacity')
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
