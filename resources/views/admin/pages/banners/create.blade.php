@extends('adminlte::page')

@section('title', 'Create Banner')

@section('content_header')
    <h1>Create Banner</h1>
@stop

@php
$config = [
    "height" => "200",
]
@endphp

@section('content')
    <div class="wrap">
        <form action="{{route('banners.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Основная информация</div>
                        <div class="card-body">
                            <div class="row">
                                <x-adminlte-input fgroup-class="col-lg-6" name="url" label="Ссылка баннера" placeholder="Ссылка..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-link text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input-switch fgroup-class="col-lg-3" name="is_active" label="Статус" label-class="text-lightblue"></x-adminlte-input-switch>
                                <x-adminlte-input-switch fgroup-class="col-lg-3" name="is_advert" label="Реклама?" label-class="text-lightblue"></x-adminlte-input-switch>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Описание</div>
                        <div class="card-body"><x-adminlte-text-editor name="banner_text" :config="$config"/></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Banner image
                        </div>
                        <div class="card-body">
                            <x-adminlte-input-file id="banner_image" name="image" label-class="text-lightblue" placeholder="Выберите файл..." legend="Выбрать">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-upload text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                            <div class="preview cover"></div>
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
