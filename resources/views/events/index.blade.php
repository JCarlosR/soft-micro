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

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Enviado por</th>
                            <th>Para</th>
                            <th>Fecha de envío</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->from }}</td>
                                <td>{{ $event->to }}</td>
                                <td>{{ $event->created_at }}</td>
                                <form action="" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </form>
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
