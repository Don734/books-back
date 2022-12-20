@extends('adminlte::page')

@section('title', 'Reviews')

@section('content_header')
    <h1>Reviews</h1>
@stop

@section('content')
    <div class="actions-col col-14 mb-3">
        {{-- <a href="{{route('banners.create')}}" class="btn btn-success" role="button" aria-pressed="true">Add</a> --}}
    </div>
    <table class="table table-striped data-table" id="reviews_table">
        @include('admin.partials.table.head',[
            'fields'=>[
            'id'=>['sortable'=>true,"name"=>"ID"],
            'image'=>['sortable'=>false,"name"=>"Image"],
            'text'=>['sortable'=>false,"name"=>"Text"],
            'status'=>['sortable'=>false,"name"=>"Status"],
            'actions'=>['sortable'=>false,"name"=>"Actions"],
            ]
        ])
        <tbody>
            {{-- @foreach ($reviews as $review)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><img class="image" src="{{\Storage::url($banner->banner_image_url)}}" alt=""></td>
                    <td>{{ $banner->banner_text }}</td>
                    <td>{{ $banner->is_active ? 'Active' : 'Not Active' }}</td>
                    <td>
                        <a href="{{route('banners.show', ['banner' => $banner])}}" class="btn btn-xs btn-default text-teal mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-eye"></i></a>
                        <a href="{{route('banners.edit', ['banner' => $banner])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                        <a href="{{route('banners.delete', ['banner' => $banner])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">   
@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#reviews_table').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)