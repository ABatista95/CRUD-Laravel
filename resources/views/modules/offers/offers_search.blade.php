@extends('layout.layout')
@section('titlePage', 'CRUD - Buscar Ofertas')
@section('content')
    @php
        $creation = "{}";
        if(Session::get('success')) $creation = Session::get('success');
        if(Session::get('error')) $creation = Session::get('error');
    @endphp
    <input type="hidden" id="responseCreate" value="{{ $creation }}">

    <h1>Consulta de procesos</h1>
    <div class="px-2 mb-4 px-md-3">
        <form action="{{ route('offers.filters') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="object" class="form-label">Objeto</label>
                    <input type="text" name="object" id="object" class="form-control" placeholder="Identificador de objeto">
                </div>
                <div class="col-md-5">
                    <label for="description" class="form-label">Descripción</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Descripción de oferta">
                </div>
                <div class="col-md-3">
                    <label for="status_id" class="form-label">Estado</label>
                    <select name="status_id" id="status_id" class="form-select">
                        <option value="" selected>Todos</option>
                        <option value="1">Activo</option>
                        <option value="2">Publicado</option>
                        <option value="3">Evaluación</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-secondary dark:text-white mx-3"><i class="fas fa-search mr-2"></i><span>Buscar</span></button>
                <a href="{{ route('offers.export') }}" class="btn btn-success dark:text-white"><i class="fas fa-file-excel mr-2"></i><span>Generar Excel</span></a>
            </div>
        </form>
    </div>
    <span>Total procesos / ofertas: <b>{{ $totalRecords }}</b></span>
    <hr>
    <div class="card-text">
        <div class="table table-responsive px-1">
            @include('modules.offers.components.offers_table', $dataOffers)
        </div>
        <div class="row">
            <div class="col-sm-12">
                {{ $dataPaging->links() }}
            </div>
        </div>
    </div>
@endsection
