@extends('adminlte::page')

@section('title', 'Reviews')

@section('content_header')
    <h1>Reviews</h1>
@stop

@section('content')
    <table class="table table-striped data-table" id="reviews_table">
        @include('admin.partials.table.head',[
            'fields'=>[
                'id'=>['sortable'=>true,"name"=>"ID"],
                'name'=>['sortable'=>false,"name"=>"Name"],
                'answered_at'=>['sortable'=>false,"name"=>"Answered at"],
                'activated_at'=>['sortable'=>false,"name"=>"Activated at"],
                'status'=>['sortable'=>false,"name"=>"Status"],
                'actions'=>['sortable'=>false,"name"=>"Actions"],
            ]
        ])
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $review->name }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="{{route('reviews.activate', ['review' => $review])}}" class="btn btn-xs btn-success text-teal mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-bullhorn"></i></a>
                        <a href="{{route('reviews.edit', ['review' => $review])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                        <a href="{{route('reviews.delete', ['review' => $review])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-trash"></i></a>
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
            $('#reviews_table').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)