@extends('adminlte::page')

@section('title', 'Create Product')

@section('content_header')
    <h1>Create Product</h1>
@stop

@php
$config = [
    "height" => "200",
];
$configSelect = [
        "placeholder" => "Категории...",
        "allowClear" => true,
];
@endphp

@section('content')
    <div class="wrap">
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Основная информация</div>
                        <div class="card-body">
                            <x-adminlte-input name="title" label="Название продукта" placeholder="Введите название продукта..." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-heading text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div class="row">
                                <x-adminlte-input fgroup-class="col-lg-4" name="barcode" label="Штрихкод" placeholder="Введите штрихкод.." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-barcode text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-4" name="price" label="Цена" placeholder="Введите цену..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-money-bill text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-4"  name="sale_price" label="Скидочная цена" placeholder="Введите скидочную цену..." label-class="text-lightblue">
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
                                <x-adminlte-input fgroup-class="col-lg-3" name="size" label="Размер" placeholder="Введите размер..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-barcode text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-3" name="age" label="Возраст" placeholder="Введите возраст..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-barcode text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-3" name="binding" label="Переплёт" placeholder="Переплёт..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-barcode text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-3" name="weight" label="Вес" placeholder="Укажите вес..." label-class="text-lightblue">
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
                            <x-adminlte-text-editor name="description" :config="$config"/>
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
                            <div class="preview cover"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Информация о продукте</div>
                        <div class="card-body">
                            <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Категории" label-class="text-lightblue" :config="$configSelect" multiple>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-lightblue">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                </x-slot>
                                <x-slot name="appendSlot">
                                    <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
                                </x-slot>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                @endif
                            </x-adminlte-select2>
                            <x-adminlte-input name="year" label="Год выпуска" placeholder="Введите год выпуска.." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-barcode text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input name="page_count" label="Количество страниц" placeholder="Введите кол-во страниц.." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-barcode text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <x-adminlte-input name="quantity" label="Количество" placeholder="Введите количество..." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-money-bill text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div class="row">
                                <x-adminlte-input-switch fgroup-class="col-lg-4" name="is_active" label="Статус" label-class="text-lightblue"></x-adminlte-input-switch>
                                <x-adminlte-input-switch fgroup-class="col-lg-4" name="is_new" label="Новый?" label-class="text-lightblue"></x-adminlte-input-switch>
                                <x-adminlte-input-switch fgroup-class="col-lg-4" name="is_recommend" label="Рекомендуемый?" label-class="text-lightblue"></x-adminlte-input-switch>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Загрузка файлов</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                          <li class="nav-item">
                            <a class="nav-link active" href="#choose-file" data-toggle="tab">Файлы</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#link" data-toggle="tab">Ссылки</a>
                          </li>
                        </ul>
                      </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane active" id="choose-file">
                            <x-adminlte-input-file id="files" name="upload_files[]" label-class="text-lightblue" placeholder="Choose files..." legend="Choose" multiple>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-upload text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                            <div class="preview"></div>
                        </div>
                        <div class="tab-pane" id="link">
                            <x-adminlte-input name="links[1]" placeholder="Ссылка на картинку" label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-heading text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div class="d-grid gap-2">
                                <button class="btn btn-success btn-block" id="addInput" type="button">Добавить поле</button>
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
