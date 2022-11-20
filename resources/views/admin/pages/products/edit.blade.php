@extends('adminlte::page')

@section('title', $product->title)

@section('content_header')
    <h1>{{$product->title}}</h1>
@stop

@php
$config = [
    "height" => "200",
];
$confActive = [
    'state' => $product->is_active ? true : false,
];
$confNew = [
    'state' => $product->is_new ? true : false,
];
$confRecommend = [
    'state' => $product->is_recommend ? true : false,
];
@endphp

@section('content')
    <div class="wrap p-2 bg-white">
        <form action="{{route('products.update', ['product' => $product])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <x-adminlte-input fgroup-class="col-lg-4" name="barcode" value="{{$product->barcode}}" label="Barcode" placeholder="Enter barcode..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-barcode text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input fgroup-class="col-lg-4" name="price" value="{{$product->price}}" label="Price" placeholder="Enter price..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-money-bill text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input fgroup-class="col-lg-4" name="sale_price" value="{{$product->sale_price}}" label="Sale Price" placeholder="Enter sale price..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-money-bill text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-input fgroup-class="col-lg-4" name="title" label="Title" value="{{$product->title}}" placeholder="Enter product title..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-heading text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input fgroup-class="col-lg-4" name="quantity" value="{{$product->quantity}}" label="Quantity" placeholder="Enter quantity..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-money-bill text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input-file fgroup-class="col-lg-4" id="files" name="upload_files[]" label="Upload files" label-class="text-lightblue" placeholder="Choose files..." legend="Choose" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-file-upload text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
            </div>
            <div class="row col-lg-5">
                <x-adminlte-input-switch fgroup-class="col-lg-4" name="is_active" label="Status" :config="$confActive" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-toggle-on"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-switch>
                <x-adminlte-input-switch fgroup-class="col-lg-4" name="is_new" label="Is New?" :config="$confNew" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-toggle-on"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-switch>
                <x-adminlte-input-switch fgroup-class="col-lg-4" name="is_recommend" label="Is Recommend?" :config="$confRecommend" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-toggle-on"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-switch>
            </div>
            <x-adminlte-text-editor name="description" :config="$config">{{$product->description}}</x-adminlte-text-editor>
            <x-adminlte-button type="submit" label="Submit" theme="success"/>
        </form>
        @if (count($product->productHasImages))
            <div class="gallery">
                <h4>Gallery</h4>
                <div class="row">
                    @foreach ($product->productHasImages as $image)
                        <div class="col col-md-3">
                            <img src="{{\Storage::url($image->url)}}" alt="">
                            <div class="controls">
                                <a href="{{$image->url}}" class="btn btn-xs btn-default text-danger mx-1 shadow control"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">   
@stop

@section('js')
    <script></script>
@stop

@section('plugins.Summernote', true)
