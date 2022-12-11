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
    <div class="wrap p-2 bg-white">
        <form action="{{route('banners.update', ['banner' => $banner])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-md-7">
                <div class="row">
                    <x-adminlte-input-file fgroup-class="col-lg-4" name="banner_image_url" label="Upload image" label-class="text-lightblue" placeholder="Choose image..." legend="Choose">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file-upload text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>
                    <x-adminlte-input fgroup-class="col-lg-6" name="url" label="Banner link" value="{{$banner->url}}" placeholder="Enter link..." label-class="text-lightblue">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-link text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="row">
                    <x-adminlte-input-switch fgroup-class="col-lg-2" name="is_active" label="Status" :config="$confActive" label-class="text-lightblue">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-toggle-on"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-switch>
                    <x-adminlte-input-switch fgroup-class="col-lg-2" name="is_advert" label="Is Advert?" :config="$confAdvert" label-class="text-lightblue">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-toggle-on"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-switch>
                </div>
                <x-adminlte-text-editor name="text" :config="$config">{{$banner->text}}</x-adminlte-text-editor>
            </div>
            <x-adminlte-button type="submit" label="Submit" theme="success"/>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">   
@stop

@section('js')
    <script></script>
@stop

@section('plugins.Summernote', true)
