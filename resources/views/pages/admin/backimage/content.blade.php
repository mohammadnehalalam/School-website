@extends('layouts.admin-master', ['pageName'=> 'backimage', 'title' => 'Add BackImage'])
@push('admin-css')
    <link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet">  
@endpush    
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <h4 class="heading"><i class="fa fa-address-card"></i> Update Background Image</h4>
                    <form action="{{ route('backimage.update', $backimage) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-center">
                            <div class="col-md-5 mb-2">
                                <div class="form-group my-2 text-center">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: auto;height: 130px;">
                                </div>
                                <label for="bgimage" class="">Page's cover (Size: 1349px x 250px)</label>
                                <input style="padding: 1px;" class="form-control form-control-sm" id="bgimage" type="file" name="bgimage" onchange="readURL(this);">
                            </div>
                            <div class="col-md-12 clearfix mt-1">
                                <hr class="mt-0">
                                <div class="float-md-right">
                                    <button type="reset" class="btn btn-dark btn-sm">Reset</button>
                                    <button type="submit" class="btn btn-info btn-sm">Update</button>
                                </div>
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
                    .width(auto)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset($backimage->bgimage) }}";

    // function readURL2(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
            
    //         reader.onload = function (e) {
    //             $('#previewImage2')
    //                 .attr('src', e.target.result)
    //                 .width(auto)
    //                 .height(120);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // document.getElementById("previewImage2").src="{{ asset('/website/assets/image/section-background/'.$backimage->bgimage_news) }}";
</script>
@endpush