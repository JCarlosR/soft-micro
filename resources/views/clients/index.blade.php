@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clientes</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>IMEI</th>
                            <th># Teléfono</th>
                            <th>Último HB</th>
                            <th>Tipo</th>
                            <th>Username</th>
                            <th>Fecha creación</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->IMEI }}</td>
                                <td>{{ $client->phoneNumber }}</td>
                                <td>{{ $client->lastRequest }}</td>
                                <td>{{ $client->type }}</td>
                                <td>{{ $client->username }}</td>
                                <td>{{ $client->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo cliente</div>

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
                            <label for="phoneNumber"># Teléfono</label>
                            <input type="text" id="phoneNumber" class="form-control" name="phoneNumber" value="{{ old('phoneNumber') }}" required>
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
                            Registrar cliente
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
