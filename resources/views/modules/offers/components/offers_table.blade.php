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
        <th scope="col">Moneda</th>
        <th scope="col">Presupuesto</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dataOffers as $item)
        <tr>
            <th scope="row">{{ $item->offer_id }}</th>
            <td>{{ $item->creator }}</td>
            <td>{{ $item->object }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->start_date }}</td>
            <td>{{ $item->end_date }}</td>
            <td>{{ $item->statusOffer->name }}</td>
            <td>{{ $item->currency }}</td>
            <td align="right">{{ number_format($item->budget) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
