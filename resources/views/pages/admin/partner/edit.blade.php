@extends('layouts.admin-master', ['pageName'=> 'partner', 'title' => 'Edit Partner'])
{{-- @section('title', 'Our Partner') --}}
@push('admin-css')
@endpush    
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <div class="d-flex justify-content-between heading">
                        <h4 class=""><i class="fa fa-edit"></i> Edit Partner</h4>
                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                        </div>
                    </div>
                    <form action="{{ route('partner.update', $partner) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name">Partner Name <span class="text-danger"> * </span></label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $partner->name }}" placeholder="partner company name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="image" class="mt-1">Partner Image <small>(Size: 400px * 150px)</small></label>
                                <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                            </div>
                            <div class="col-md-4 offset-md-1 mt-3">
                                <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 150px;height: 120px; background: #3f4a49;">
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="clearfix mt-1">
                            <div class="float-md-left">
                                <a href="{{route('partner.index')}}" class="btn btn-sm btn-dark">Back</a>
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
    document.getElementById("previewImage").src="{{ asset($partner->image) }}";
</script>
@endpush