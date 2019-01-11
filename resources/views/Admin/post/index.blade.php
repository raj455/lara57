@extends('layouts.backend.app')

@section('title')
Post | Dashboard
@endsection

@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
     <div class="block-header">
         <a class="btn bg-blue waves-effect" href="{{ route('admin.post.create') }}">
            <i class="material-icons">add</i>
         <span>Add New Post</span>
     </a>
     </div>                   
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ALL POSTS
                        <span class="badge bg-blue">{{ $posts->count() }}</span>
                    </h2>                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>                                    
                                    <th>Author</th>                                    
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>Is Approved</th>                                    
                                    <th>Status</th>                                    
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>                                    
                                    <th>Author</th>                                    
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>Is Approved</th>                                    
                                    <th>Status</th>                                    
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>                                    
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach($posts as $key => $value)
                                <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>
                                        @if($value->is_approved)
                                            <span class="badge bg-blue">Approved</span>
                                        @else
                                            <span class="badge bg-pink">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($value->status)
                                            <span class="badge bg-blue">Published</span>
                                        @else
                                            <span class="badge bg-pink">UnPublished</span>
                                        @endif
                                    </td>
                                    
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-xs waves-effect"><i class="material-icons">remove_red_eye</i></a>
                                        <a href="{{ route('admin.post.edit',['post' => $value->id]) }}" class="btn btn-success btn-xs waves-effect"><i class="material-icons">edit</i></a>
                                        <a class="btn btn-danger btn-xs waves-effect" href="{{ route('admin.post.destroy',['post' => $value->id]) }}" onclick="event.preventDefault();document.getElementById('delForm').submit();"><i class="material-icons">delete</i></a>

                                        <form id="delForm" method="POST" style="display:none;" action="{{ route('admin.post.destroy',['post' => $value->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                        
                                        </form>

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
    <!-- #END# Exportable Table -->
</div>
@endsection

@push('js')
<!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush
