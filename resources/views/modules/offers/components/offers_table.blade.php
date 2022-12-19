<table class="table table-sm table-abordered">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Creador</th>
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
    @foreach($dataOffers as $item)
        <tr>
            <th scope="row">{{ $item->offer_id }}</th>
            <td>{{ $item->creator }}</td>
            <td>{{ $item->object }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ explode(" ", $item->start_date)[0] }}</td>
            <td>{{ explode(" ", $item->end_date)[0] }}</td>
            <td>{{ $item->statusOffer->name }}</td>
            <td>Responsable</td>
            <td>Acciones</td>
        </tr>
    @endforeach
    </tbody>
</table>
