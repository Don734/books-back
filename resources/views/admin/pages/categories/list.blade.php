@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    <div class="actions-col col-14 mb-3">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <a href="{{route('categories.create')}}" class="btn btn-success" role="button" aria-pressed="true">Add</a>
            </div>
        </div>
    </div>
    <table class="table table-striped data-table" id="categories_table">
        @include('admin.partials.table.head',[
            'fields'=>[
            'id'=>['sortable'=>true,"name"=>"ID"],
            'name'=>['sortable'=>false,"name"=>"Name"],
            'status'=>['sortable'=>false,"name"=>"Status"],
            'actions'=>['sortable'=>false,"name"=>"Actions"],
            ]
        ])
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->is_active ? 'Active' : 'Not Active' }}</td>
                    <td>
                        <a href="{{route('categories.show', ['category' => $category])}}" class="btn btn-xs btn-default text-teal mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-eye"></i></a>
                        <a href="{{route('categories.edit', ['category' => $category])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                        <a href="{{route('categories.delete', ['category' => $category])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-trash"></i></a>
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
            $('#categories_table').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)