@extends('adminlte::page')

@section('title', 'Settings')

@php
    $config = [
        "height" => "200",
    ];
    $configMaintenance = [
        "height" => "200",
        "placeholder" => "Текст при тех. обслуживании"
    ];
@endphp

@section('content_header')
    <div class="container-fluid"><h1>Settings</h1></div>
@stop

@section('content')
    <div class="container-fluid">
        <form action="">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Настройки</div>
                        <div class="card-body">
                            <x-adminlte-input name="tab_text" label="Описание вкладки" value="{{$configs['TAB_NAME']['value']}}" placeholder="Введите текст..." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-message text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-text-editor name="body_script" label="Body script" label-class="text-lightblue" :config="$config">{{$configs['BODY_SCRIPT']['value']}}</x-adminlte-text-editor>
                            <x-adminlte-text-editor name="maintenance" label="Тех. Обслуживание" label-class="text-lightblue" :config="$configMaintenance">{{$configs['MAINTENANCE']['value']}}</x-adminlte-text-editor>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Логотип</div>
                        <div class="card-body">
                            <x-adminlte-input-file id="cover_image" name="LOGO_IMAGE" label-class="text-lightblue" placeholder="Выберите файл..." legend="Выбрать">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-upload text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                            <div class="preview cover">
                                @if (!empty($configs['LOGO_IMAGE']['value']))
                                    <div class="thumb-wrap">
                                        <img src="{{\Storage::url($configs['LOGO_IMAGE']['value'])}}" class="img-thumbnail">
                                        <div class="controls">
                                            <a href="{{$configs['LOGO_IMAGE']['value']}}" class="btn btn-xs btn-default text-danger mx-1 shadow control"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">   
@stop

@section('js')
    <script src="{{asset('js/admin.js')}}"></script>
@stop