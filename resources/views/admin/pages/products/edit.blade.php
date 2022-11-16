@extends('adminlte::page')

@section('title', 'Create Product')

@section('content_header')
    <h1>Create Product</h1>
@stop

@php
$config = [
    "height" => "200",
]
@endphp

@section('content')
    <div class="wrap p-2 bg-white">
        <form action="{{route('products.update', ['product' => $product])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <x-adminlte-input fgroup-class="col-lg-4" name="title" label="Title" value="{{$product->title}}" placeholder="Enter product title..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-heading text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
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
            </div>
            <div class="row">
                <x-adminlte-input fgroup-class="col-lg-4" name="quantity" value="{{$product->quantity}}" label="Quantity" placeholder="Enter quantity..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-money-bill text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select fgroup-class="col-lg-4" name="is_active" value="{{$product->is_active}}" label="Status" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-check"></i>
                        </div>
                    </x-slot>
                    <option value="true">Active</option>
                    <option value="false">Not Active</option>
                </x-adminlte-select>
                <x-adminlte-input-file fgroup-class="col-lg-4" id="files" name="upload_files[]" label="Upload files" label-class="text-lightblue" placeholder="Choose files..." legend="Choose" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-file-upload text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
            </div>
            <x-adminlte-text-editor name="description" :config="$config">{{$product->description}}</x-adminlte-text-editor>
            <x-adminlte-button type="submit" label="Submit" theme="success"/>
        </form>
    </div>
@stop

@section('js')
    <script></script>
@stop

@section('plugins.Summernote', true)
