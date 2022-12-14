@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')
    <div class="actions-col col-14 mb-3">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <a href="{{route('products.create')}}" class="btn btn-success" role="button" aria-pressed="true">Add</a>
            </div>
            <div class="col-md-4 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal">
                    Import
                </button>
            </div>
        </div>
    </div>
    <table class="table table-striped data-table" id="products_table">
        @include('admin.partials.table.head',[
            'fields'=>[
            'id'=>['sortable'=>true,"name"=>"ID"],
            'articul'=>['sortable'=>false,"name"=>"Articul"],
            'name'=>['sortable'=>false,"name"=>"Name"],
            'price'=>['sortable'=>false,"name"=>"Price"],
            'quantity'=>['sortable'=>false,"name"=>"Quantity"],
            'status'=>['sortable'=>false,"name"=>"Status"],
            'actions'=>['sortable'=>false,"name"=>"Actions"],
            ]
        ])
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity}}</td>
                    <td>{{ $product->is_active ? 'Active' : 'Not Active' }}</td>
                    <td>
                        <a href="{{route('products.show', ['product' => $product])}}" class="btn btn-xs btn-default text-teal mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-eye"></i></a>
                        <a href="{{route('products.edit', ['product' => $product])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                        <a href="{{route('products.delete', ['product' => $product])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@include('admin.partials.modals.import')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">   
@stop

@section('js')
    <script src="{{asset('js/admin.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#products_table').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)