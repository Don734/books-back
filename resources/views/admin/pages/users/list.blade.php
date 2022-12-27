@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <div class="actions-col col-14 mb-3">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <a href="{{route('users.create')}}" class="btn btn-success" role="button" aria-pressed="true">Add</a>
            </div>
        </div>
    </div>
    <table class="table table-striped data-table" id="users_table">
        @include('admin.partials.table.head',[
            'fields'=>[
            'id'=>['sortable'=>true,"name"=>"ID"],
            'name'=>['sortable'=>false,"name"=>"Name"],
            'email'=>['sortable'=>false,"name"=>"Email"],
            'role'=>['sortable'=>false,"name"=>"Role"],
            'status'=>['sortable'=>false,"name"=>"Status"],
            'actions'=>['sortable'=>false,"name"=>"Actions"],
            ]
        ])
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->is_active ? 'Active' : 'Not Active' }}</td>
                    <td>
                        <a href="{{route('users.show', ['user' => $user])}}" class="btn btn-xs btn-default text-teal mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-eye"></i></a>
                        <a href="{{route('users.edit', ['user' => $user])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                        <a href="{{route('users.delete', ['user' => $user])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" role="button" aria-pressed="true"><i class="fa fa-lg fa-fw fa-trash"></i></a>
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
            $('#users_table').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)