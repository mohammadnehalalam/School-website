@extends('layouts.admin-master', ['pageName'=> 'video', 'title' => 'Edit Video'])
{{-- @section('title', 'gallery') --}}
@push('admin-css')
@endpush
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <h4 class="heading"><i class="fas fa-edit"></i> Edit Video</h4>
                    <form action="{{ route('update.video', $video->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="link"> Video Url <span class="text-danger">*</span> </label>
                                <input type="url" name="link" class="form-control form-control-sm shadow-none @error('link') is-invalid @enderror" id="link" placeholder="Update Video" value="{{ $video->link }}">
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <iframe width="100%" height="274" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="clearfix border-top">
                            <div class="float-md-right mt-2">
                                <a href="{{ route('videos') }}" id="prev" class="btn btn-dark btn-sm">Prev</a>
                                <button type="submit" class="btn btn-info btn-sm">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
