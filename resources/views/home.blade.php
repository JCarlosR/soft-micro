@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Bienvenido {{ auth()->user()->name }}!</p>
                    <p>Selecciona una opción de tu interés:</p>

                    <a href="{{ url('/clients') }}" class="btn btn-primary btn-bg btn-block">
                        Consultar Clientes
                    </a>
                    <a href="{{ url('/modules') }}" class="btn btn-primary btn-bg btn-block">
                        Consultar Módulos
                    </a>
                    <a href="{{ url('/events') }}" class="btn btn-primary btn-bg btn-block">
                        Consultar Eventos
                    </a>
                    <a href="{{ url('/log') }}" class="btn btn-primary btn-bg btn-block">
                        Consultar Log
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
