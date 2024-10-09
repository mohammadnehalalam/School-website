@extends('layouts.admin-master', ['pageName'=> 'about', 'title' => 'Edit about'])
{{-- @section('title', 'Our about') --}}
@push('admin-css')
@endpush
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <div class="d-flex justify-content-between heading">
                        <h4 class=""><i class="fa fa-edit"></i> Edit about</h4>
                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                        </div>
                    </div>
                    <form action="{{ route('abouts.update', $about) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">


                            <div class="col-md-6 mb-2">
                                <label for="description">Description <span class="text-danger"> * </span></label>
                                <textarea name="description" id="description"  cols="30" rows="10" class="form-control form-control-sm @error('description') is-invalid @enderror">{{ $about->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="date">Date <span class="text-danger"> * </span></label>
                                <input class="form-control form-control-sm @error('date') is-invalid @enderror" id="date" type="date" name="date" value="{{ $about->date ? $about->date : old('date') }}">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                                <label for="image" class="mt-1">about Image <small>(Size: 400px * 150px)</small></label>
                                <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                            </div>
                            <div class="col-md-4 offset-md-1 mt-3">
                                <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 150px;height: 120px; background: #3f4a49;">
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="clearfix mt-1">
                            <div class="float-md-left">
                                <a href="{{route('abouts.index')}}" class="btn btn-sm btn-dark">Back</a>
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
    document.getElementById("previewImage").src="{{ asset($about->image) }}";
</script>
@endpush
