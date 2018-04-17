@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Módulos</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>IMEI</th>
                            <th>Último HB</th>
                            <th>Tipo</th>
                            <th>Username</th>
                            <th>Fecha creación</th>
                            <th>Opciones</th>
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
                                <td>
                                    <form action="">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo móudlo</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="IMEI">IMEI</label>
                            <input type="text" id="IMEI" class="form-control" name="IMEI" value="{{ old('IMEI') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select name="type" id="type" required class="form-control">
                                <option value="GSM">GSM</option>
                                <option value="WiFi">WiFi</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" name="username" value="{{ old('username') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" value="" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Registrar módulo
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
