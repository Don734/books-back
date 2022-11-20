@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <x-adminlte-small-box title="150" text="New Orders" icon="fas fa-lg fa-shopping-bag text-dark" theme="info" url="#" url-text="View details"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-small-box title="58%" text="Bounce Rate" icon="fas fa-lg fa-chart-bar text-dark" theme="teal" url="#" url-text="View details"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-small-box title="44" text="User Registrations" icon="fas fa-lg fa-user-plus text-dark" theme="warning" url="#" url-text="View details"/>
        </div>
    </div>
    <div class="col-lg-7 p-0">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                  </li>
                </ul>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart"
                     style="position: relative; height: 300px;">
                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                 </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@stop

@section('js')
    <script src="{{asset('js/admin.js')}}"></script>
@endsection