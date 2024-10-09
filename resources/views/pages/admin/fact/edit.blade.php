@extends('layouts.admin-master', ['pageName'=> 'fact', 'title' => 'Edit fact'])
{{-- @section('title', 'Our fact') --}}
@push('admin-css')
@endpush
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <div class="d-flex justify-content-between heading">
                        <h4 class=""><i class="fa fa-edit"></i> Edit fact</h4>
                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                        </div>
                    </div>
                    <form action="{{ route('fact.update', $fact) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="students"> students <span class="text-danger"> * </span></label>
                                <input class="form-control @error('students') is-invalid @enderror" id="students" type="number" name="students" value="{{ $fact->students }}" placeholder="">
                                @error('students')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="teachers">teachers <span class="text-danger"> * </span></label>
                                    <input class="form-control @error('teachers') is-invalid @enderror" id="teachers" type="number" name="teachers" value="{{ $fact->teachers }}" placeholder="">
                                    @error('teachers')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="staffs">staffs <span class="text-danger"> * </span></label>
                                        <input class="form-control @error('staffs') is-invalid @enderror" id="staffs" type="number" name="staffs" value="{{ $fact->staffs }}" placeholder="">
                                        @error('staffs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>


                        <hr class="my-2">
                        <div class="clearfix mt-1">
                            <div class="float-md-left">
                                <a href="{{route('fact.index')}}" class="btn btn-sm btn-dark">Back</a>
                                <button type="submit" class="btn btn-sm btn-info">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('admin-js')

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset($fact->image) }}";
</script>
@endpush
