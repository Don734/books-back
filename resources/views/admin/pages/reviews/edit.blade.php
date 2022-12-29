@extends('adminlte::page')

@section('title', $category->title)

@section('content_header')
    <h1>{{$category->title}}</h1>
@stop

@php
$config = [
    "height" => "200",
];
// $confActive = [
//     'state' => $category->is_active ? true : false,
// ];
@endphp

@section('content')
    <div class="wrap p-2 bg-white">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Комментарий пользователя</p>
                        <p>Дата комментария</p>
                    </div>
                    <div class="card-body">
                        <p>{{$review->comment}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Описание</div>
                    <div class="card-body">
                        <form action="{{route('reviews.update', ['review' => $review])}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <x-adminlte-text-editor name="answer" :config="$config">{{$review->answer}}</x-adminlte-text-editor>
                            <div class="row">
                                <x-adminlte-input-switch name="is_active" label="Статус" label-class="text-lightblue"></x-adminlte-input-switch>
                                <x-adminlte-input-switch name="is_publish" label="Статус" label-class="text-lightblue"></x-adminlte-input-switch>
                            </div>
                            
                            <div class="form-footer">
                                <x-adminlte-button type="submit" label="Submit" theme="success"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Информация о пользователе</div>
                    <div class="card-body">
                        <div class="user-image"></div>
                        <div class="user-info">
                            <p class="name">John Doe</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">   
@stop

@section('js')
    <script src="{{asset('js/admin.js')}}"></script>
@stop

@section('plugins.Summernote', true)
