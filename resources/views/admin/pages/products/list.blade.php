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
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity}}</td>
                    <td>{{ $product->is_active ? 'Active' : 'Not Active' }}</td>
                    <td>
                        <a href="{{route('products.show', ['id' => $product->id])}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">show</a>
                        <a href="{{route('products.edit', ['id' => $product->id])}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">edit</a>
                        <a href="{{route('products.delete', ['id' => $product->id])}}" class="btn btn-danger btn-sm" role="button" aria-pressed="true">remove</a>
                    </td>
                </tr>
            @endforeach
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