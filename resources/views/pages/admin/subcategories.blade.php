@extends('layouts.admin-master', ['pageName'=> 'subcategory', 'title' => 'Add Subcategories'])

{{-- @section('title') Add Subcategory @endsection --}}

@section('admin-content')

<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        @if(@isset($subcategoryData))
                        <i class="fas fa-edit mr-1"></i>Update Subcategory
                        
                        @else
                        <i class="fas fa-plus mr-1"></i>Add Subcategory
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ (@$subcategoryData) ? route('admin.subcategory.update', $subcategoryData->id) : route('admin.subcategory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name"> Category <span class="text-danger">*</span> </label>
                                    <select name="category_id" class="form-control form-control-sm mb-2">
                                        <option value="">Select Category Option</option>
                                        @if (@$subcategoryData)
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $subcategoryData->category_id ? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == old('category_id')? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category_id') <span style="color: red">{{$message}}</span><br> @enderror


                                    <label for="name"> Subcategory Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ @$subcategoryData ? $subcategoryData->name : old('name') }}" class="form-control form-control-sm mb-2" id="name" placeholder="Enter Category name">
                                    @error('name') <span style="color: red">{{$message}}</span><br> @enderror

                                    <label for="rank"> Subcategory Rank <span class="text-danger">*</span> </label>
                                    <input type="number" name="rank" value="{{ @$subcategoryData ? $subcategoryData->rank : old('rank') }}" class="form-control form-control-sm mb-2" id="rank" placeholder="Enter Rank">
                                    @error('rank') <span style="color: red">{{$message}}</span><br> @enderror


                                    <label for="image"> Subcategory Image<span class="text-danger">*</span> <small>(Size: 768px * 768px)</small></label>
                                    <input type="file" name="image" value="{{ @$subcategoryData->image }}" class="form-control form-control-sm mb-2" id="image" onchange="mainThambUrl(this)">
                                    @error('image') <span style="color: red">{{$message}}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-2 d-flex align-items-center justify-content-center">
                                    <div class="form-group mb-0">
                                        <img class="form-controlo img-thumbnail" src="{{(@$subcategoryData) ? asset('uploads/subcategory/'.$subcategoryData->image) : asset('uploads/no.png') }}" id="mainThmb" style="width: 180px;height: 135px;">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clearfix border-top">
                                <div class="float-md-right mt-2">
                                    <button type="reset" {{ (@$subcategoryData) ? 'id=prev' : '' }} class="btn btn-dark btn-sm">{{ (@$subcategoryData)? 'Prev' : 'Reset' }}</button>
                                    <button type="submit" class="btn btn-info btn-sm">{{(@$subcategoryData)?'Update':'Create'}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        <i class="fas fa-list mr-1"></i>
                        Subcategory List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rank</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategory as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{!! @$item->rank? $item->rank : '<span class="text-danger">None</span>' !!}</td>
                                        <td><img src="{{ asset('uploads/subcategory/'. $item->image) }}" alt="" style="max-width: 100%; height: 70px"></td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.subcategory.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.subcategory.delete', $item->id) }}" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</main>
@endsection
@push('admin-js')
<script>
    document.getElementById("prev").onclick = function () {
        location.href = "{{ route('admin.subcategories') }}";
    };
</script>

<script>
    function mainThambUrl(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(150)
                  .height(120);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>
@endpush

