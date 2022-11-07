@extends('adminlte::page')

@section('title', 'Gallery')

@section('content_header')
    <h1>Gallery</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="col-14">
            <form action="">
                <label>
                    <input type="file" name="files" id="">
                </label>
            </form>
        </div>
    </div>
@endsection

@section('css')

@stop

@section('js')
    <script></script>
@stop

@section('plugins.Datatables', true)