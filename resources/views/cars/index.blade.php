 @extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Lista de Vehículos</h2>
        <a href="{{ route('cars.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Agregar Vehículo
        </a>
    </div>

    <form method="GET" action="{{ route('cars.index') }}" class="mb-4">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" name="search" class="form-control" placeholder="Buscar por placa, marca o cliente..." value="{{ request('search') }}">
        </div>
    </form>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Cliente</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cars as $car)
                <tr id="carRow{{ $car->id }}">
                    <td>{{ $car->placa }}</td>
                    <td>{{ $car->marca }}</td>
                    <td>{{ $car->modelo }}</td>
                    <td>{{ \Carbon\Carbon::parse($car->anio_fabricacion)->format('d/m/Y') }}</td>
                    <td>
                        {{ $car->contact->nombre ?? '-' }} {{ $car->contact->apellidos ?? '' }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('cars.show', $car->id) }}" class="text-info me-2" title="Ver">
                            <i class="bi bi-eye-fill fs-5"></i>
                        </a>
                        <a href="{{ route('cars.edit', $car->id) }}" class="text-warning me-2" title="Editar">
                            <i class="bi bi-pencil-fill fs-5"></i>
                        </a>
                        <button type="button" class="btn btn-link p-0 text-danger" onclick="confirmDelete('{{ $car->id }}')" title="Eliminar">
                            <i class="bi bi-trash-fill fs-5"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No se encontraron registros.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        @if ($cars->hasPages())
        <nav>
            <ul class="pagination pagination-sm justify-content-center">
                <li class="page-item {{ $cars->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link custom-page-link" href="{{ $cars->previousPageUrl() }}" tabindex="-1">
                        &laquo; Anterior
                    </a>
                </li>

                @foreach ($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                    <li class="page-item {{ $cars->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link custom-page-link {{ $cars->currentPage() == $page ? 'active-page' : '' }}" href="{{ $url }}">
                            {{ $page }}
                        </a>
                    </li>
                @endforeach

                <li class="page-item {{ $cars->currentPage() == $cars->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link custom-page-link" href="{{ $cars->nextPageUrl() }}">
                        Siguiente &raquo;
                    </a>
                </li>
            </ul>
        </nav>
        @endif
    </div>

</div>
@endsection


@section('scripts')
<script>
   function confirmDelete(carId) {
    Swal.fire({
        title: '¿Eliminar vehículo?',
        text: "Esta acción no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/cars/${carId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    const row = document.getElementById(`carRow${carId}`);
                    if(row) row.remove();

                    Swal.fire({
                        icon: 'success',
                        title: '¡Eliminado!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    });

                    const tbody = document.querySelector('table tbody');
                    if(tbody.children.length === 0) {
                        const emptyRow = document.createElement('tr');
                        emptyRow.innerHTML = `<td colspan="6" class="text-center text-muted">No se encontraron registros.</td>`;
                        tbody.appendChild(emptyRow);
                    }

                } else {
                    Swal.fire('Error', 'No se pudo eliminar el vehículo', 'error');
                }
            })
            .catch(() => {
                Swal.fire('Error', 'No se pudo eliminar el vehículo', 'error');
            });
        }
    });
}
</script>
@endsection
