@extends('layouts.admin-master', ['pageName'=> 'management', 'title' => @isset($managementData) ? 'Update Management' : 'Management'])
{{-- @section('title', 'gallery') --}}
@push('admin-css')
@endpush
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <h4 class="heading">
                        @if(@isset($managementData))
                            <i class="fas fa-edit"></i>
                            <span>Update Management</span>
                        @else
                            <i class="fas fa-plus"></i>
                            <span>Add Management</span>
                        @endif
                    </h4>
                    <form action="{{ (@$managementData) ? route('management.update', $managementData->id) : route('management.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name"> Name <span class="text-danger">*</span> </label>
                                <input type="text" name="name" class="form-control form-control-sm shadow-none @error('name') is-invalid @enderror" value="{{ @$managementData ? $managementData->name : old('name')}}" id="name" placeholder="Enter a Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="designation"> Designation <span class="text-danger">*</span> </label>
                                <input type="text" name="designation" class="form-control form-control-sm shadow-none  @error('designation') is-invalid @enderror" value="{{ @$managementData ? $managementData->designation : old('designation') }}" id="designation" placeholder="Enter a Designation">
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="facebook"> Facebook </label>
                                <input type="url" name="facebook" class="form-control form-control-sm shadow-none  @error('facebook') is-invalid @enderror" value="{{ @$managementData ? $managementData->facebook : old('facebook') }}" id="facebook" placeholder="Facebook Link">
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="twitter"> Twitter </label>
                                <input type="text" name="twitter" class="form-control form-control-sm shadow-none  @error('twitter') is-invalid @enderror" value="{{ @$managementData ? $managementData->twitter : old('twitter') }}" id="twitter" placeholder="Twitter Link">
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="instagram"> Instagram </label>
                                <input type="text" name="instagram" class="form-control form-control-sm shadow-none  @error('instagram') is-invalid @enderror" value="{{ @$managementData ? $managementData->instagram : old('instagram') }}" id="instagram" placeholder="Instagram Link">
                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="readURL(this);">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group mt-2">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 160px;height: 130px; background: #3f4a49;">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix border-top">
                            <div class="float-md-right mt-2">
                                <button type="reset" class="btn btn-dark btn-sm">Reset</button>
                                <button type="submit" class="btn btn-info btn-sm">{{(@$managementData)?'Update':'Save'}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card my-3">
            <div class="card-header">
                <i class="fas fa-list"></i>
                All Member List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($management as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img class="border" style="height: auto; max-width:20%" src="{{ asset($item->image) }}" alt=""></td>
                                    <td>{{ $item->name }}</td>                                    
                                    <td>{{ $item->designation }}</td>
                                    <td>
                                        <a href="{{ route('management.edit', $item->id) }}" type="submit" class="btn btn-info btn-mod-info btn-sm mr-1"><i class="fas fa-edit"></i></button>
                                        <a href="{{ route('management.delete', $item->id) }}" type="submit" class="btn btn-danger btn-mod-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td rowspan="5">Data Not Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
                    .width(160)
                    .height(130);
            };

            reader.readAsDataURL(input.files[0]);
        }
    } 
    @if(isset($managementData->image))
    document.getElementById("previewImage").src="/uploads/management/{{ $managementData->image }}";
    @else
    document.getElementById("previewImage").src="/uploads/no.png";
    @endif   

</script>
@endpush