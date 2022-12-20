@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <div class="container-fluid"><h1>Profile</h1></div>
@stop

@section('content')
    <div class="container-fluid">
        <form action="">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Настройки профиля</div>
                        <div class="card-body">
                            <div class="row">
                                <x-adminlte-input fgroup-class="col-lg-6" name="name" label="Имя и фамилия" placeholder="Введите текст..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-heading text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-6" name="email" type="email" label="Почта" placeholder="Введите текст..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-heading text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                            <div class="row">
                                <x-adminlte-input fgroup-class="col-lg-6" name="password" type="password" label="Пароль" placeholder="Введите пароль..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-heading text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                                <x-adminlte-input fgroup-class="col-lg-6" name="password_confirm" type="password" label="Почта" placeholder="Введите текст..." label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-heading text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Аватарка</div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('css')

@stop

@section('js')
    <script></script>
@stop