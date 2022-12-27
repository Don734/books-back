@extends('adminlte::page')

@section('title', 'Blogs')

@section('content_header')
    <h1>Blogs</h1>
@stop

@section('content')
    <div class="actions-col col-14 mb-3">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <a href="{{route('blogs.create')}}" class="btn btn-success" role="button" aria-pressed="true">Add</a>
            </div>
        </div>
    </div>
    <table class="table table-striped data-table" id="blogs_table">
        @include('admin.partials.table.head',[
            'fields'=>[
            'id'=>['sortable'=>true,"name"=>"ID"],
            'name'=>['sortable'=>false,"name"=>"Title"],
            'status'=>['sortable'=>false,"name"=>"Status"],
            'actions'=>['sortable'=>false,"name"=>"Actions"],
            ]
        ])
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->is_active ? 'Active' : 'Not Active' }}</td>
                    <td>
                        <a href="{{route('blogs.show', ['blog' => $blog])}}" class="btn btn-xs btn-default text-teal mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-eye"></i></a>
                        <a href="{{route('blogs.edit', ['blog' => $blog])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                        <a href="{{route('blogs.delete', ['blog' => $blog])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">   
@stop

@section('js')
    <script src="{{asset('js/admin.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#blogs_table').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)