@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Eventos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="active"><a href="#requests" role="tab" data-toggle="tab">Solicitudes</a></li>
                        <li><a href="#responses" role="tab" data-toggle="tab">Respuestas</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="requests">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Enviado por</th>
                                    <th>Para</th>
                                    <th>Mensaje</th>
                                    <th>Fecha de envío</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($requests as $event)
                                    <tr>
                                        <td>{{ $event->from }}</td>
                                        <td>{{ $event->to }}</td>
                                        <td>{{ $event->data }}</td>
                                        <td>{{ $event->created_at }}</td>
                                        <td>
                                            <form action="" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <button type="submit" class="btn btn-danger" title="Eliminar">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="responses">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Enviado por</th>
                                    <th>Para</th>
                                    <th>Mensaje</th>
                                    <th>Fecha de envío</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($responses as $event)
                                    <tr>
                                        <td>{{ $event->from }}</td>
                                        <td>{{ $event->to }}</td>
                                        <td>{{ $event->data }}</td>
                                        <td>{{ $event->created_at }}</td>
                                        <td>
                                            <form action="" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <button type="submit" class="btn btn-danger" title="Eliminar">
                                                    <i class="glyphicon glyphicon-remove"></i>
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
            </div>
        </div>
    </div>
</div>
@endsection
