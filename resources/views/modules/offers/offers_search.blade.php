@extends('layout.layout')
@section('titlePage', 'CRUD - Buscar Ofertas')
@section('content')
    <h1>Search Offers</h1>
    <i class="fas fa-yin-yang" style="color:red;"></i>
    <div>
        <p>Description</p>
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
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
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
