@extends('adminlte::page')

@section('title', 'Banner')

@section('content_header')
    <h1>Banner</h1>
@stop

@php
$config = [
    "height" => "200",
];
$confActive = [
    'state' => $blog->is_active ? true : false,
];
@endphp

@section('content')
    <div class="wrap p-2 bg-white">
        <form action="{{route('blogs.update', ['blog' => $blog])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Основная информация</div>
                        <div class="card-body">
                            <x-adminlte-input name="title" label="Название блога" value="{{$blog->title}}" placeholder="Введите название блога..." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-heading text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Описание</div>
                        <div class="card-body">
                            <x-adminlte-text-editor name="text" :config="$config">{{$blog->description}}</x-adminlte-text-editor>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Обложка
                        </div>
                        <div class="card-body">
                            <x-adminlte-input-file id="cover_image" name="cover_image" label-class="text-lightblue" placeholder="Выберите файл..." legend="Выбрать">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-upload text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                            <div class="preview cover">
                                <div class="thumb-wrap">
                                    <img src="{{\Storage::url($blog->cover_link)}}" class="img-thumbnail">
                                    <div class="controls">
                                        <a href="{{$category->cover_link}}" class="btn btn-xs btn-default text-danger mx-1 shadow control"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Информация о продукте</div>
                        <div class="card-body">
                            <x-adminlte-input-switch name="is_active" label="Статус" :config="$confActive" label-class="text-lightblue"></x-adminlte-input-switch>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <x-adminlte-button type="submit" label="Submit" theme="success"/>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">   
@stop

@section('js')
    <script src="{{asset('js/admin.js')}}"></script>
@stop

@section('plugins.Summernote', true)
