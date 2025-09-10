 @extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Editar Vehículo</h2>
        <a href="{{ route('cars.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('cars.form')
                <div class="mt-4 d-flex justify-content-end gap-2">
                    <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
