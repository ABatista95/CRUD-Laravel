@extends('layout.layout')
@section('titlePage', 'CRUD - Buscar Ofertas')
@section('content')
    <h1>Search Offers</h1>
    <i class="fas fa-yin-yang" style="color:red;"></i>
    <div>
        <p>Description</p>
        @php
            $creation = "{}";
            if(Session::get('success')) $creation = Session::get('success');
            if(Session::get('error')) $creation = Session::get('error');
        @endphp
        <input type="hidden" id="responseCreate" value="{{ $creation }}">
    </div>
    <hr>
    <p class="card-text">
        <div class="table table-responsive px-1">
            <table class="table table-sm table-abordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ronda</th>
                        <th scope="col">Objeto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Fecha cierre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data_offers as $item)
                    <tr>
                        <th scope="row">{{ $item->offer_id }}</th>
                        <td>{{ $item->creator }}</td>
                        <td>{{ $item->object }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ explode(" ", $item->start_date)[0] }}</td>
                        <td>{{ explode(" ", $item->end_date)[0] }}</td>
                        <td>{{ $item->status }}</td>
                        <td>Responsable</td>
                        <td>Acciones</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </p>
@endsection

@section("scripts")
    <script type="text/javascript">

    </script>
@endsection
