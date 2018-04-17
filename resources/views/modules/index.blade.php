@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Módulos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>IMEI</th>
                            <th>Último HB</th>
                            <th>Tipo</th>
                            <th>Username</th>
                            <th>Fecha creación</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($modules as $module)
                            <tr>
                                <td>{{ $module->IMEI }}</td>
                                <td>{{ $module->lastRequest }}</td>
                                <td>{{ $module->type }}</td>
                                <td>{{ $module->username }}</td>
                                <td>{{ $module->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
