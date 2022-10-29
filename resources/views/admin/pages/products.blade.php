@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')
    <table class="table data-table products_table">
        @include('admin.partials.table.head',[
            'fields'=>[
            'id'=>['sortable'=>true,"name"=>"ID"],
            'name'=>['sortable'=>false,"name"=>"Name"],
            'Brand'=>['sortable'=>false,"name"=>"Brand"],
            'Model'=>['sortable'=>false,"name"=>"Model"],
            'price'=>['sortable'=>false,"name"=>"Price"],
            'quantity'=>['sortable'=>false,"name"=>"Quantity"],
            'status'=>['sortable'=>false,"name"=>"Status"],
            ]
        ])
        <tbody>
            <tr>
                <td>1</td>
                <td>Product 1</td>
                <td>1000</td>
                <td>5</td>
                <td>Active</td>
                <td></td>
            </tr>
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@section('plugins.Datatables', true)