@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.edit_section') }}
@endsection


@section('content')


<div class="col-xxl-6">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.edit_section') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.sections.index') }}">{{ __('models.sections') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('models.edit_section') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.sections.update' , $section->id) }}" enctype="multipart/form-data" novalidate>

                    @method('PUT')
                    @csrf



                    {{--  name  --}}
                    <div class="col-md-6">
                        <label for="name" class="form-label">{{ __('models.name') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $section->name) }}" id="name"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('name')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6"></div>




                    <div class="col-lg-6">
                        <label class="form-label" for="meta-description-input">{{ __('models.grades') }}</label>

                        <select class="form-control js-example-basic-multiple" name="grade_id" id="grade_id">
                            <option value="{{ $section->grade_id }}">{{ $section->grade->name }}</option>
                            <option value="" disabled> {{ __('models.grades') }} </option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label" for="meta-description-input">{{ __('models.class_rooms') }}</label>

                        <select class="form-control js-example-basic-multiple" name="class_room_id" id="class_room_id">
                            <option value="" disabled> {{ __('models.class_rooms') }} </option>
                            <option value="{{ $section->class_room_id }}">{{ $section->classroom->name }}</option>


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
    {{--  select  --}}
    <script>
        $(document).ready(function () {
            $('#grade_id').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/grade-rooms') }}/" + grade_id
                        , type: "GET"
                        , dataType: "json"
                        , success: function (data) {

                            $.each(data, function (key, value) {
                                $('#class_room_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                        ,
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

@endsection
