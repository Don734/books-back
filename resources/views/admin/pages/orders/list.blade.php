@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
    <div class="actions-col col-14 mb-3">
        <a href="{{route('orders.create')}}" class="btn btn-success" role="button" aria-pressed="true">Add</a>
    </div>
    <table class="table table-striped data-table" id="orders_table">
        @include('admin.partials.table.head',[
            'fields'=>[
            'id'=>['sortable'=>true,"name"=>"ID"],
            'customer'=>['sortable'=>false,"name"=>"Customer"],
            'payment'=>['sortable'=>false,"name"=>"Payment"],
            'amount'=>['sortable'=>false,"name"=>"Amount"],
            'status'=>['sortable'=>false,"name"=>"Status"],
            'created'=>['sortable'=>false,"name"=>"Created at"],
            'actions'=>['sortable'=>false,"name"=>"Actions"],
            ]
        ])
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $order->customer }}</td>
                    <td>{{ $order->payment }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->is_active ? 'Active' : 'Not Active' }}</td>
                    <td>
                        <a href="{{route('orders.show', ['order' => $order])}}" class="btn btn-xs btn-default text-teal mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-eye"></i></a>
                        <a href="{{route('orders.delete', ['order' => $order])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#orders_table').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)