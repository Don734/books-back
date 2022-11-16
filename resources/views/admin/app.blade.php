@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <x-adminlte-info-box title="New Orders" text="150" icon="fas fa-lg fa-shopping-bag text-dark" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Bounce Rate" text="58%" icon="fas fa-lg fa-chart-bar text-dark" theme="success"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="User Registrations" text="44" icon="fas fa-lg fa-user-plus text-dark" theme="warning"/>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@stop