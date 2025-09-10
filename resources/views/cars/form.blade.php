 <h5 class="mb-3">Datos del Vehículo</h5>
<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="form-floating">
            <input type="text" name="placa" class="form-control @error('placa') is-invalid @enderror"
                   value="{{ old('placa', $car->placa ?? '') }}" placeholder="Placa" required>
            <label>Placa</label>
            @error('placa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-floating">
            <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror"
                   value="{{ old('marca', $car->marca ?? '') }}" placeholder="Marca" required>
            <label>Marca</label>
            @error('marca')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-floating">
            <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror"
                   value="{{ old('modelo', $car->modelo ?? '') }}" placeholder="Modelo" required>
            <label>Modelo</label>
            @error('modelo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-floating">
            <input type="date" name="anio_fabricacion" class="form-control @error('anio_fabricacion') is-invalid @enderror"
                   value="{{ old('anio_fabricacion', $car->anio_fabricacion ?? '') }}" 
                   max="{{ date('Y-m-d') }}" placeholder="Año de Fabricación" required>
            <label>Año de Fabricación</label>
            @error('anio_fabricacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Aquí agregamos el campo de imagen -->
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror">
            <label>Imagen del Vehículo</label>
            @error('imagen')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @if(isset($car->imagen))
            <div class="mb-3">
                <img src="{{ asset('storage/' . $car->imagen) }}" alt="Imagen del Vehículo" class="img-fluid rounded" style="max-height: 200px;">
            </div>
        @endif
    </div>

</div>

<hr class="my-4">

<h5 class="mb-3">Contacto</h5>
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="form-floating">
            <select id="client_select" name="contact_id" class="form-control @error('contact_id') is-invalid @enderror" required>
                <option value="">-- Seleccionar contacto --</option>
                @foreach($contacts as $contact)
                    <option value="{{ $contact->id }}"
                        data-nombre="{{ $contact->nombre }}"
                        data-apellidos="{{ $contact->apellidos }}"
                        data-dni="{{ $contact->nro_documento }}"
                        data-telefono="{{ $contact->telefono }}"
                        data-correo="{{ $contact->correo }}"
                        {{ old('contact_id', $car->contact_id ?? '') == $contact->id ? 'selected' : '' }}>
                        {{ $contact->nombre }} {{ $contact->apellidos }}
                    </option>
                @endforeach
            </select>
            <label>Cliente</label>
            @error('contact_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-floating mb-2">
            <input type="text" id="client_nombre" class="form-control" placeholder="Nombre" readonly>
            <label>Nombre</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" id="client_apellidos" class="form-control" placeholder="Apellidos" readonly>
            <label>Apellidos</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" id="client_dni" class="form-control" placeholder="DNI" readonly>
            <label>DNI</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" id="client_telefono" class="form-control" placeholder="Teléfono" readonly>
            <label>Teléfono</label>
        </div>
        <div class="form-floating">
            <input type="text" id="client_correo" class="form-control" placeholder="Correo" readonly>
            <label>Correo</label>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('client_select');

    function updateClientInfo() {
        const option = select.selectedOptions[0];
        if(option && option.value){
            document.getElementById('client_nombre').value = option.dataset.nombre;
            document.getElementById('client_apellidos').value = option.dataset.apellidos;
            document.getElementById('client_dni').value = option.dataset.dni;
            document.getElementById('client_telefono').value = option.dataset.telefono;
            document.getElementById('client_correo').value = option.dataset.correo;
        } else {
            document.getElementById('client_nombre').value = '';
            document.getElementById('client_apellidos').value = '';
            document.getElementById('client_dni').value = '';
            document.getElementById('client_telefono').value = '';
            document.getElementById('client_correo').value = '';
        }
    }

    select.addEventListener('change', updateClientInfo);
    updateClientInfo();
});
</script>