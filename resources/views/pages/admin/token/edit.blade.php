@extends('layouts.admin-master', ['pageName'=> 'token', 'title' => 'Edit token'])
{{-- @section('title', 'Our token') --}}
@push('admin-css')
@endpush
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <div class="d-flex justify-content-between heading">
                        <h4 class=""><i class="fa fa-edit"></i> Edit token</h4>
                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                        </div>
                    </div>
                    <form action="{{ route('token.update', $token) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="days">Days<span class="text-danger"> * </span></label>
                                <input class="form-control @error('days') is-invalid @enderror" id="days" type="number" name="days" value="{{ $token->days }}" >
                                @error('days')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="hours">token Name <span class="text-danger"> * </span></label>
                                <input class="form-control @error('hours') is-invalid @enderror" id="hours" type="number" name="hours" value="{{ $token->hours }}" >
                                @error('hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="minutes">token Name <span class="text-danger"> * </span></label>
                                <input class="form-control @error('minutes') is-invalid @enderror" id="minutes" type="number" name="minutes" value="{{ $token->minutes }}" >
                                @error('minutes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="seconds">token Name <span class="text-danger"> * </span></label>
                                <input class="form-control @error('seconds') is-invalid @enderror" id="seconds" type="number" name="seconds" value="{{ $token->seconds }}" >
                                @error('seconds')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                        <hr class="my-2">
                        <div class="clearfix mt-1">
                            <div class="float-md-left">
                                <a href="{{route('token.index')}}" class="btn btn-sm btn-dark">Back</a>
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
    document.getElementById("previewImage").src="{{ asset($token->image) }}";
</script>
@endpush
