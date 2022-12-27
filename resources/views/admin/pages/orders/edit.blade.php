@extends('adminlte::page')

@section('title', $product->title)

@section('content_header')
    <h1>{{$product->title}}</h1>
@stop

@php
$config = [
    "height" => "200",
];
$options = [
    'true' => 'Active',
    'false' => 'Not Active',
];
$is_active = $product->is_active ? 'true' : 'false';
$selected = [
    $is_active
]
@endphp

@section('content')
    <div class="wrap p-2 bg-white">
        <form action="{{route('orders.update', ['order' => $order])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <x-adminlte-input fgroup-class="col-md-6" name="customer_name" label="Customer Name" value="{{$order->customer_name}}" placeholder="Enter customer name..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-heading text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input fgroup-class="col-md-6" name="email" label="Email" value="{{$order->email}}" placeholder="Enter email..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-barcode text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input fgroup-class="col-md-6" name="phone" label="Phone" value="{{$order->phone}}" placeholder="Enter phone..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-money-bill text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input fgroup-class="col-md-6" name="address" label="address" value="{{$order->address}}" placeholder="Enter address..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-money-bill text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div id="map"></div>
            <div class="row radio-group">
                <div class="col-lg-4 radio-input">
                    <input type="radio" name="payment1">
                </div>
            </div>
            <x-adminlte-text-editor name="description" :config="$config">{{$product->description}}</x-adminlte-text-editor>
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
    <script></script>
@stop

@section('plugins.Summernote', true)
