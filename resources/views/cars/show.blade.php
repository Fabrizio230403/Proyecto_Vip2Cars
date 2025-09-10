 @extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Detalles del Vehículo</h2>
        <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm border-primary mb-4">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-car-front-fill me-2"></i> Datos del Vehículo
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <p><i class="bi bi-upc-scan me-2"></i><b>Placa:</b> {{ $car->placa }}</p>
                </div>
                <div class="col-md-6">
                    <p><i class="bi bi-tags-fill me-2"></i><b>Marca:</b> {{ $car->marca }}</p>
                </div>
                <div class="col-md-6">
                    <p><i class="bi bi-gear-fill me-2"></i><b>Modelo:</b> {{ $car->modelo }}</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><i class="bi bi-calendar-event-fill me-2"></i><strong>Año de Fabricación:</strong> {{ \Carbon\Carbon::parse($car->anio_fabricacion)->format('Y') }}</p>
                </div>
                @if($car->imagen)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $car->imagen) }}" alt="Imagen del Vehículo" class="img-fluid rounded" style="max-height: 250px;">
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-success">
        <div class="card-header bg-success text-white">
            <i class="bi bi-person-fill me-2"></i> Datos del Cliente
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <p><i class="bi bi-person-badge-fill me-2"></i><b>Nombre:</b> {{ $car->contact->nombre }} {{ $car->contact->apellidos }}</p>
                </div>
                <div class="col-md-6">
                    <p><i class="bi bi-card-text me-2"></i><b>Documento:</b> {{ $car->contact->nro_documento }}</p>
                </div>
                <div class="col-md-6">
                    <p><i class="bi bi-envelope-fill me-2"></i><b>Correo:</b> {{ $car->contact->correo }}</p>
                </div>
                <div class="col-md-6">
                    <p><i class="bi bi-telephone-fill me-2"></i><b>Teléfono:</b> {{ $car->contact->telefono }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
