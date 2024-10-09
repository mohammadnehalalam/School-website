@extends('layouts.admin-master', ['pageName'=> 'messenger', 'title' => 'Update Messenger'])
{{-- @section('title', 'gallery') --}}
@push('admin-css')
@endpush
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-area">
                    <h4 class="heading">
                        <i class="fas fa-edit"></i>
                        <span>Update Page Link</span>
                    </h4>
                    <form action="{{ route('messenger.update', $messenger)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="link">Enter Link <span class="text-danger">*</span> </label>
                                <input type="url" name="link" class="form-control form-control-sm shadow-none @error('link') is-invalid @enderror" value="{{ $messenger->link }}" id="link" placeholder="Enter a link">
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="clearfix border-top">
                            <div class="float-md-right mt-2">
                                <button type="reset" class="btn btn-dark btn-sm">Reset</button>
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