@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')
    <div class="actions-col col-14 mb-3">
        <a href="{{route('products.create')}}" class="btn btn-success" role="button" aria-pressed="true">Add</a>
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
            <tr>
                <td>1</td>
                <td>ART123/45</td>
                <td>Product 1</td>
                <td>1000</td>
                <td>5</td>
                <td>Active</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true">edit</a>
                    <a href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">remove</a>
                </td>
            </tr>
        </tbody>
    </table>
@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#products_table').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)