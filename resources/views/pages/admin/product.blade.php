@extends('layouts.admin-master', ['pageName'=> 'product', 'title' => 'Add Product'])

{{-- @section('title') Add Product @endsection --}}

@push('admin-css')
    <link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet">  
@endpush

@section('admin-content')


<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        @if(@isset($productData))
                        <i class="fas fa-edit mr-1"></i>Update Product
                        @else
                        <i class="fas fa-plus mr-1"></i>Add Product
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ (@$productData) ? route('admin.product.update', $productData->id) : route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name" class="mb-2"> Product Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ @$productData ? $productData->name : old('name')}}" class="form-control form-control-sm mb-2" id="name" placeholder="Enter Category Name">
                                    @error('name') <span style="color: red">{{$message}}</span><br> @enderror

                                    <label for="rank" class="mb-2"> Product Rank <span class="text-danger">*</span> </label>
                                    <input type="number" name="rank" value="{{ @$productData ? $productData->rank : old('rank')}}" class="form-control form-control-sm mb-2" id="rank" placeholder="Enter Rank">
                                    @error('rank') <span style="color: red">{{$message}}</span><br> @enderror


                                    <label for="code" class="mb-2"> Product Code </label>
                                    <input type="text" name="code" value="{{ @$productData ? $productData->code : old('code')}}" class="form-control form-control-sm mb-2" id="code" placeholder="Enter Product Code">
                                    @error('code') <span style="color: red">{{$message}}</span><br> @enderror

                                   
                                    <label for="description">Product Description</label>
                                    @if(@$productData)
                                    <textarea name="description" class="form-control" id="description" rows="3">{{  $productData->description }}</textarea>
                                    @else
                                    <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') ?  old('description') : '' }}</textarea>
                                    @endif
                                   
                                </div>
                                <div class="col-md-6 mb-2">
                                   

                                    <label for="name" class="mb-2"> Category <span class="text-danger">*</span> </label>
                                    <select name="category_id" class="form-control form-control-sm mb-2">
                                        <option value="">Select Category Option</option>
                                        @if (@$productData)
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == @$productData->category_id ? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == old('category_id')? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category_id') <span style="color: red">{{$message}}</span><br> @enderror


                                    <label for="name" class="mb-2"> Subcategory <span class="text-danger">*</span> </label>
                                    <select name="subcategory_id" class="form-control form-control-sm mb-2">
                                        <option value="">Select Subcategory Option</option>
                                        @if(@$productSubData)
                                            @foreach ($productSubData as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == @$productData->subcategory_id ? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($subcategory as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == old('subcategory_id')? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        @endif


                                    </select>
                                    @error('subcategory_id') <span style="color: red">{{$message}}</span> @enderror


                                    <label for="price" class="mb-2"> Product Price </label>
                                    <input type="number" name="price" value="{{ @$productData ? $productData->price : old('price')}}" class="form-control form-control-sm mb-2" id="price" placeholder="Enter Product Price">
                                    @error('price') <span style="color: red">{{$message}}</span><br> @enderror



                                    <label for="image" class="mb-2">Product Image <span class="text-danger">*</span> <small>(Size: 4000px * 2667px)</small></label>
                                    <input class="form-control form-control-sm" id="image" type="file" name="image" onchange="mainThambUrl(this)">
                                    <div class="form-group mt-2">
                                        <img class="form-controlo img-thumbnail" src="{{(@$productData) ? asset($productData->image) : asset('uploads/no.png') }}" id="mainThmb" style="width: 150px;height: 120px;">
                                    </div>
                                    @error('image') <span style="color: red">{{$message}}</span> @enderror
                                </div>
                                <div class="clearfix border-top">
                                    <div class="float-md-right mt-2">
                                        @if(@$productData)
                                        <a href="{{ route('admin.products') }}" class="btn btn-sm btn-dark">Back</a>
                                        @else
                                        <button type="reset" class="btn btn-sm btn-dark">Reset</button>
                                        @endif
                                        <button type="submit" class="btn btn-sm btn-info">{{(@$productData)?'Update':'Save'}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        <i class="fas fa-list mr-1"></i>
                        Product List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rank No</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Price</th>
                                        <th>Product Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{!! @$item->rank ? $item->rank : '<span class="text-danger">None</span>' !!}</td>
                                        <td><img src="{{ asset($item->image) }}" alt="" style="height: 70px; max-width: 100%"></td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->subcategory->name }}</td>
                                        <td>{{ @$item->price?$item->price:'Unknown' }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $item->id) }}" class="btn-sm btn btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.product.delete', $item->id) }}" onclick="return confirm('Are you sure to Delete?')" class="btn-sm btn btn-danger"><i class="fas fa-trash"></i></a>
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
<script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>
<script>
    $('#description').summernote({
        tabsize: 2,
        height: 100
    });
</script>

<script>
    $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/product/subcategory/get') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });
        
    });
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
