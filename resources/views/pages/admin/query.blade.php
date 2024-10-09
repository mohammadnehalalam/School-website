@extends('layouts.admin-master', ['pageName'=> 'query', 'title' => 'All Customer Queries'])

{{-- @section('title', 'Query') --}}
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="card my-3">
            <div class="card-header">
                <i class="fas fa-project-diagram"></i>
                Service Queries
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($query as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{!! $item->phone !!}</td>
                                    <td>{!! $item->email !!}</td>
                                    <td>
                                        @if(countwords($item->service) > 15)
                                        {!! Str::words($item->service, 15, '...') !!}
                                        @else
                                        {{ $item->service }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(countwords($item->message) > 10)
                                        {!! Str::words($item->message, 10, '...') !!}
                                        @else
                                        {{ $item->message }}
                                        @endif
                                    </td>                          
                                    <td>
                                        @if(countwords($item->message) > 10)
                                        <a href="#staticBackdrop{{ $item->id }}" class="d-inline btn btn-primary btn-sm b-btn mr-1"  data-toggle="modal" style="text-decoration: none;">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <div class="modal fade" id="staticBackdrop{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content modal-background">
                                                    <div class="modal-header message-modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Query Message</h5>
                                                        <p class="mb-0 ms-auto mt-1"><strong class="text-white">Date: </strong>{{ $item->created_at }}</p>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body" style="background: #f2f2f2; padding: 0.5rem 1rem">
                                                        <div class="clearfix">
                                                            <div class="name float-left model-pattern" >Name: <span style="color: #000">{{  $item->name }}</span></div>
                                                            <div class="email float-right model-pattern" >Email: <span style="color: #000">{{ $item->email }}</span></div>
                                                        </div>
                                                        <hr class="custom-hr">
                                                        <div style="padding-top: 0; text-align: justify">
                                                            <strong class="message d-block model-pattern">Message: </strong>
                                                            {!! $item->message !!}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer message-modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <a href="{{ route('delete.service', $item->id) }}" type="submit" class="d-inline btn btn-danger btn-sm b-btn" onclick="return confirm('Are you sure you want to delete?');"><i class="fas fa-trash"></i></button>
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
            </div>
        </div>
    </div>
</main>
@endsection
