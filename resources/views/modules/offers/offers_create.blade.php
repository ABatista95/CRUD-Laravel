@extends('layout.layout')
@section('titlePage', 'CRUD - Crear Ofertas')

@section('css')

@endsection

@section('content')
    <h2 class="mb-3">Crear proceso / Evento participación cerrada</h2>
    <div class="card ">
        <h5 class="card-header">Información básica</h5>
        <div class="card-body">
            <form action="{{ route('offers.store') }}" class="row g-3 needs-validation" id="formCreateOffers" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="col-md-6">
                    <label for="object" class="form-label">Objeto</label>
                    <input type="text" class="form-control" id="object" name="object" placeholder="Identificador del objeto" required>
                    <div class="invalid-feedback">
                        Ingrese un identificador
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="listProductt" class="form-label">Actividad</label>
                    <div class="input-group select-activity">
                        <select id="listProductt" name="activity_id" class="form-select" aria-describedby="currency-input" required>
                            <option selected disabled value="">Seleccionar</option>
                            @foreach($activitiesList as $activity)
                                <option value="1">{{ $activity }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-text"><i class="far fa-search"></i></span>
                        <div class="invalid-feedback">
                            Seleccione una actividad.
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    <div class="invalid-feedback">
                        Ingrese una descripción.
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="currency" class="form-label">Moneda</label>
                    <div class="input-group">
                        <span class="input-group-text" id="currency"><i class="fas fa-file-invoice-dollar"></i></span>
                        <select id="currency" name="currency" class="form-select" aria-describedby="currency-input">
                            <option selected data-locale="es-CO" data-currency="COP" data-icon="dollar" value=COP">COP</option>
                            <option data-locale="en-US" data-currency="USD" data-icon="dollar" value="USD">USD</option>
                            <option data-locale="it-IT" data-currency="EUR" data-icon="euro" value="EUR">EUR</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="budget" class="form-label">Presupuesto</label>
                    <div class="input-group">
                        <span class="input-group-text" id="budget-icon"><i class="far fa-dollar-sign"></i></span>
                        <input
                            type="number"
                            id="budget"
                            name="budget"
                            maxlength="15"
                            class="form-control form-control--budget"
                            placeholder="Valor"
                            aria-label="Valor"
                            aria-describedby="basic-addon1"
                            required>
                        <div class="invalid-feedback">
                            Ingrese un monto.
                        </div>
                    </div>
                </div>

                <hr class="m-0 mt-4">
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Fecha de inicio</label>
                    <input
                        type="date"
                        id="start_date"
                        name="start_date"
                        class="form-control"
                        min="2022-12-01"
                        max="2030-12-31"
                        required>
                    <div class="invalid-feedback">
                        Ingrese una fecha.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="start_time" class="form-label">Hora de inicio</label>
                    <input
                        type="time"
                        id="start_time"
                        name="start_time"
                        class="form-control"
                        required>
                    <div class="invalid-feedback">
                        Ingrese una hora.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label">Fecha de cierre</label>
                    <input
                        type="date"
                        id="end_date"
                        name="end_date"
                        class="form-control"
                        min="2022-12-01"
                        max="2030-12-31"
                        required>
                    <div class="invalid-feedback">
                        Ingrese una fecha.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="end_time" class="form-label">Hora de cierre</label>
                    <input
                        type="time"
                        id="end_time"
                        name="end_time"
                        class="form-control"
                        required>
                    <div class="invalid-feedback">
                        Ingrese una hora.
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                    {{--  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalConfirmSave">Guardar</button>--}}
                    <button type="submit" class="btn btn-primary" >Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal" id="modalConfirmSave" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancelar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Se eliminaran los datos</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_confirm_save">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $('#listProductClassess').select2();
        $('#listProduct').select2();
        $('#listProductt').select2();
    </script>
@endsection
