 @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Lista de Contactos</h2>
        <a href="{{ route('contacts.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Agregar Contacto
        </a>
    </div>

    <form method="GET" action="{{ route('contacts.index') }}" class="mb-4">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, apellidos o DNI..." value="{{ request('search') }}">
        </div>
    </form>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr id="contactRow{{ $contact->id }}">
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->nombre }}</td>
                    <td>{{ $contact->apellidos }}</td>
                    <td>{{ $contact->nro_documento }}</td>
                    <td>{{ $contact->correo ?? '-' }}</td>
                    <td>{{ $contact->telefono ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="text-warning me-2" title="Editar">
                            <i class="bi bi-pencil-fill fs-5"></i>
                        </a>
                        <button type="button" class="btn btn-link p-0 text-danger" onclick="confirmDelete('{{ $contact->id }}')" title="Eliminar">
                            <i class="bi bi-trash-fill fs-5"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No se encontraron contactos.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $contacts->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
function confirmDelete(contactId) {
    Swal.fire({
        title: '¿Eliminar contacto?',
        text: "Esta acción no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/contacts/${contactId}`, {
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
                    const row = document.getElementById(`contactRow${contactId}`);
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
                        emptyRow.innerHTML = `<td colspan="7" class="text-center text-muted">No se encontraron contactos.</td>`;
                        tbody.appendChild(emptyRow);
                    }
                } else {
                    Swal.fire('Error', data.message, 'error');
                }
            })
            .catch(() => Swal.fire('Error', 'No se pudo eliminar el contacto', 'error'));
        }
    });
}
</script>
@endsection
