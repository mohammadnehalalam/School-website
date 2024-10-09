@extends('layouts.admin-master', ['pageName'=> 'news', 'title' => 'Edit News'])
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <div class="d-flex justify-content-between heading">
                        <h4 class=""><i class="fa fa-edit"></i> Edit News</h4>
                    </div>
                    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="title">News Title <span class="text-danger"> * </span></label>
                                <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ $news->title }}" placeholder="News Title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="image" class="mt-1">Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="readURL(this);">
                                <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 150px;height: 100px; background: #3f4a49;">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="description">News Details</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4">{{ $news->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="clearfix mt-1">
                            <div class="float-md-left">
                                <a href="{{ route('news.index') }}" class="btn btn-sm btn-dark">Back</a>
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
    document.getElementById("previewImage").src="{{ asset($news->image) }}";
</script>
@endpush