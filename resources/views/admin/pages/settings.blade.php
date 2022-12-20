@extends('adminlte::page')

@section('title', 'Settings')

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
                            <x-adminlte-input name="tab_text" label="Описание вкладки" placeholder="Введите текст..." label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-message text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Логотип</div>
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