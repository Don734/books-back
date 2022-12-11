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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Основная информация</div>
                        <div class="card-body">
                            <x-adminlte-input name="title" label="Название продукта" value="{{$product->title}}" placeholder="Введите название продукта..." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-heading text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div class="row">
                                <x-adminlte-input fgroup-class="col-lg-4" name="barcode" label="Штрихкод" value="{{$product->barcode}}" placeholder="Введите штрихкод.." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-barcode text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-4" name="price" label="Цена" value="{{$product->price}}" placeholder="Введите цену..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-money-bill text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-4"  name="sale_price" label="Скидочная цена" value="{{$product->sale_price}}" placeholder="Введите скидочную цену..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-money-bill text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Дополнительная информация</div>
                        <div class="card-body">
                            <div class="row">
                                <x-adminlte-input fgroup-class="col-lg-3" name="size" label="Размер" value="{{$product->size}}" placeholder="Введите размер..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-barcode text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-3" name="age" label="Возраст" value="{{$product->age}}" placeholder="Введите возраст..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-barcode text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-3" name="binding" label="Переплёт" value="{{$product->binding}}" placeholder="Переплёт..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-barcode text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-3" name="weight" label="Вес" value="{{$product->weight}}" placeholder="Укажите вес..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-balance-scale-right text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Описание</div>
                        <div class="card-body">
                            <x-adminlte-text-editor name="description" :config="$config">{{$product->description}}</x-adminlte-text-editor>
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
                                    <img src="{{\Storage::url($product->cover_link)}}" class="img-thumbnail">
                                    <div class="controls">
                                        <a href="{{$product->cover_link}}" class="btn btn-xs btn-default text-danger mx-1 shadow control"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Информация о продукте</div>
                        <div class="card-body">
                            <x-adminlte-input name="year" label="Год выпуска" value="{{$product->year}}" placeholder="Введите год выпуска.." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-barcode text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input name="page_count" label="Количество страниц" value="{{$product->page_count}}" placeholder="Введите кол-во страниц.." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-barcode text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input name="quantity" label="Количество" value="{{$product->quantity}}" placeholder="Введите количество..." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-money-bill text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div class="row">
                                <x-adminlte-input-switch fgroup-class="col-lg-4" name="is_active" :config="$confActive" label="Статус" label-class="text-lightblue"></x-adminlte-input-switch>
                                <x-adminlte-input-switch fgroup-class="col-lg-4" name="is_new" :config="$confNew" label="Новый?" label-class="text-lightblue"></x-adminlte-input-switch>
                                <x-adminlte-input-switch fgroup-class="col-lg-4" name="is_recommend" :config="$confRecommend" label="Рекомендуемый?" label-class="text-lightblue"></x-adminlte-input-switch>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Загрузка файлов</div>
                <div class="card-body">
                    <x-adminlte-input-file id="files" name="upload_files[]" label-class="text-lightblue" placeholder="Choose files..." legend="Choose" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file-upload text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>
                    <div class="preview">
                        @if (count($product->productHasImages) > 0)
                            <div class="row">
                                @foreach ($product->productHasImages as $image)
                                    <div class="thumb-wrap col-md-3">
                                        <img src="{{\Storage::url($image->url)}}" class="img-thumbnail">
                                        <div class="controls">
                                            <a href="{{$image->url}}" class="btn btn-xs btn-default text-danger mx-1 shadow control"><i class="fa fa-lg fa-fw fa-trash"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <x-adminlte-button type="submit" label="Submit" theme="success"/>
                </div>
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
