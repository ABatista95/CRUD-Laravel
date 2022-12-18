@extends('layout.layout')
@section('titlePage', 'Proyecto CRUD - Ofertas')
@section('content')
    <div class="pt-2">
        <div class="">
            <h2>MÓDULO / OFERTAS</h2>
            <p>Aplicativo desarrollado para la gestión de ofertas, el cual facilita al usuario el proceso, por medio de su interfaz adaptativa a distintos dispositivos.</p>
            <p>El diseño y desarrollo me permite demostrar mis conocimientos en desarrollo Web</p>
            <a href="#" class="d-flex align-items-center">
                <span>Contactar</span>
                <i class="fas fa-arrow-circle-right ml-1"></i>
            </a>
        </div>
        <div class="">
            <img src="" alt="">
        </div>
    </div>
    <div class="container">
        <div class="row g-2 justify-content-center">
            <div class="col-auto col-md-6 col-lg-4 mt-3 mt-sm-2">
                <div class="card text-center mx-auto" style="width: 18rem;">
                    <div class="card-header py-3">
                        <i class="far fa-layer-plus" style="font-size: 3.5rem"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">CREAR</h4>
                        <p class="card-text">Creación de nuevas ofertas para el proceso de compra.</p>
                        <a href="{{ route('offers.create') }}" class="btn btn-primary">Ingresar</a>
                    </div>
                </div>
            </div>
            <div class="col-auto col-md-6 col-lg-4 mt-3 mt-sm-2">
                <div class="card text-center mx-auto" style="width: 18rem;">
                    <div class="card-header py-3">
                        <i class="far fa-copy" style="font-size: 3.5rem"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">COPIAR</h4>
                        <p class="card-text">Obtención de información de ofertas de los procesos de compra.</p>
                        <a href="#" class="btn btn-primary">Ingresar</a>
                    </div>
                </div>
            </div>
            <div class="col-auto col-md-12 col-lg-4 mt-3 mt-sm-2">
                <div class="card text-center mx-auto" style="width: 18rem;">
                    <div class="card-header py-3">
                        <i class="far fa-chalkboard-teacher" style="font-size: 3.5rem"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">CONSULTAR</h4>
                        <p class="card-text">Consultar historias de oferas del proceso de compra.</p>
                        <a href="{{ route('offers.show') }}" class="btn btn-primary">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
