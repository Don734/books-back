@extends('adminlte::page')

@section('title', 'Order Product')

@section('content_header')
    <h1>Order Product</h1>
@stop

@php

@endphp

@section('content')
    <div class="wrap p-2 bg-white">
        <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <x-adminlte-input fgroup-class="col-md-6" name="customer_name" label="Customer Name" placeholder="Enter customer name..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-heading text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input fgroup-class="col-md-6" name="email" label="Email" placeholder="Enter email..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-barcode text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input fgroup-class="col-md-6" name="phone" label="Phone" placeholder="Enter phone..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-money-bill text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input fgroup-class="col-md-6" name="address" label="Address" placeholder="Enter address..." label-class="text-lightblue">
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
            <x-adminlte-textarea name="addon_info" label="Message" rows=2 igroup-size="sm" label-class="text-lightblue" placeholder="Write your message..." disable-feedback>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-lg fa-comment-dots text-lightblue"></i>
                    </div>
                </x-slot>
                <x-slot name="appendSlot">
                    <x-adminlte-button theme="primary" icon="fas fa-paper-plane" label="Send"/>
                </x-slot>
            </x-adminlte-textarea>
            <x-adminlte-button type="submit" label="Submit" theme="success"/>
        </form>
    </div>
@stop

@section('js')
    <script></script>
@stop
