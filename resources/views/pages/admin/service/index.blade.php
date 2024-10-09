@extends('layouts.admin-master', ['pageName'=> 'service', 'title' => 'Add Service'])
{{-- @section('title', 'Service') --}}

@push('admin-css')
    <link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet">  
@endpush
@section('admin-content')

<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-2">
                <div class="card my-3">
                    <div class="card-header">
                        <i class="fas fa-plus"></i>
                        Add a Service
                    </div>

                    <div class="card-body">
                        <form action="{{ route('store.service') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name" class="mb-1"> Title <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" class="form-control form-control-sm shadow-none @error('name') is-invalid @enderror" id="name" placeholder="Enter Service Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- 
                                    <label for="icon" class="mb-1"> Icon <span class="text-danger">*</span> </label>
                                    <input type="text" name="icon" class="form-control form-control-sm shadow-none @error('icon') is-invalid @enderror" id="icon" placeholder="Enter an Icon">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                    <label for="description" class="mb-1">Description</label>
                                    <textarea name="description" class="form-control form-control-sm" id="description" rows="3"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="s_description" class="mb-1">Short Description <span class="text-danger">*</span></label>
                                    <textarea name="s_description" class="form-control form-control-sm" id="s_description" rows="3" placeholder="Enter a short description"></textarea>
                                    @error('s_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                    <label for="image">Service Image <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-sm" id="image" type="file" name="image" onchange="readImgURL(this);">
                                    <div class="form-group mt-2" style="margin-bottom: 0">
                                        <img class="img-thumbnail" src="#" id="previewImage" style="width: 160px;height: 120px;">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix border-top">
                                <div class="float-md-right mt-2">
                                    <button type="reset" class="btn btn-dark btn-sm">Reset</button>
                                    <button type="submit" class="btn btn-info btn-sm">{{(@$subcategoryData)?'Update':'Save'}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="card my-3">
                    <div class="card-header">
                        <i class="fas fa-list"></i>
                        Service List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Short Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($services as $key=>$item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if($item->image)
                                                <img src="{{ $item->image }}" alt="" style="width: 200px; height: auto";>
                                                @else 
                                                No Data Found
                                                @endif
                                            </td>                    
                                            <td>
                                                @if($item->s_description)
                                                {!! Str::words($item->s_description, 15, '...') !!}
                                                @else
                                                No Data Found
                                                @endif
                                            </td>                                    
                                            <td>
                                                <a href="{{ route('edit.service', $item->id) }}" type="submit" class="btn btn-info btn-mod-info btn-sm mr-1"><i class="fas fa-edit"></i></button>
                                                <a href="{{ route('delete.service', $item->id) }}" type="submit" class="btn btn-danger btn-mod-danger btn-sm" onclick="return confirm('Are you sure you want to delete?');"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Data Not Found</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    
</main>
@endsection

@push('admin-js')
<script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>
<script>
    $('#description').summernote({
        tabsize: 2,
        height: 120,
        placeholder: 'Enter a Long Description'
    });
</script>
<script>
    function readImgURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="/uploads/no.png";

</script>
@endpush
