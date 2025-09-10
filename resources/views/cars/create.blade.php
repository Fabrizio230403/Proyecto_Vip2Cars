 @extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Agregar Vehículo</h2>
        <a href="{{ route('cars.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('cars.form')
                <div class="mt-4 d-flex justify-content-end gap-2">
                    <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
