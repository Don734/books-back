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
    'state' => $banner->is_active ? true : false,
];
$confAdvert = [
    'state' => $banner->is_advert ? true : false,
];
@endphp

@section('content')
    <div class="wrap">
        <form action="{{route('banners.update', ['banner' => $banner])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Основная информация</div>
                        <div class="card-body">
                            <div class="row">
                                <x-adminlte-input fgroup-class="col-lg-6" name="url" label="Ссылка баннера" value="{{$banner->url}}" placeholder="Ссылка..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-link text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input-switch fgroup-class="col-lg-3" name="is_active" label="Статус" :config="$confActive" label-class="text-lightblue"></x-adminlte-input-switch>
                                <x-adminlte-input-switch fgroup-class="col-lg-3" name="is_advert" label="Реклама?" :config="$confAdvert" label-class="text-lightblue"></x-adminlte-input-switch>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Описание</div>
                        <div class="card-body"><x-adminlte-text-editor name="banner_text" :config="$config"/>{{$banner->text}}</div>
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
                            <div class="preview cover">
                                <div class="thumb-wrap">
                                    <img src="{{\Storage::url($banner->banner_image_url)}}" class="img-thumbnail">
                                    <div class="controls">
                                        <a href="{{$banner->banner_image_url}}" class="btn btn-xs btn-default text-danger mx-1 shadow control"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
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
