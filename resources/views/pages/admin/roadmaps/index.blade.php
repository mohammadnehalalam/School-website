{{-- @section('title', 'Our roadmap') --}}
@extends('layouts.admin-master', ['pageName'=> 'roadmap', 'title' => 'Add roadmap'])
                        {{-- @section('title', 'Our roadmap') --}}
@push('admin-css')
@endpush
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <div class="d-flex justify-content-between heading">
                        <h4 class=""><i class="fas fa-plus"></i> Add new roadmap</h4>
                    </div>
                    <form action="{{ route('roadmaps.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="date">Date <span class="text-danger"> * </span></label>
                        <input class="form-control form-control-sm @error('date') is-invalid @enderror" id="date" type="date" name="date" value="{{ old('date') ? old('date') : date('Y-m-d') }}">
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="title">roadmap title <span class="text-danger"> * </span></label>
                                <input class="form-control form-control-sm @error('title') is-invalid @enderror" id="title" type="text" name="title"  value="{{ old('title') }}" >
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                        </div>
                        <hr class="my-2">
                        <div class="clearfix mt-1">
                            <div class="float-md-right">
                                <button type="reset" class="btn btn-sm btn-dark">Reset</button>
                                <button type="submit" class="btn btn-sm btn-info">Save</button>
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
                All roadmap
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>date</th>
                                <th>title</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roadmap as $key=>$roadmap)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{$roadmap->date}}</td>
                                    <td>{{ $roadmap->title }}</td>
                                    <td>
                                        <a href="{{ route('roadmaps.edit',$roadmap) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="deleteroadmap({{ $roadmap->id }})"><i class="fa fa-trash"></i></button>
                                        <form id="delete-form-{{$roadmap->id}}" action="{{route('roadmaps.destroy',$roadmap)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
                    .width(150)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="/uploads/no.png";
</script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteroadmap(id) {
        swal({
            title: 'Are you sure?',
            text: "You want to Delete this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>
@endpush
