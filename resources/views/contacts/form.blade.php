@csrf

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $contact->nombre ?? '') }}" required>
    @error('nombre')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="apellidos" class="form-label">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $contact->apellidos ?? '') }}" required>
    @error('apellidos')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="nro_documento" class="form-label">DNI</label>
    <input type="text" name="nro_documento" id="nro_documento" class="form-control" value="{{ old('nro_documento', $contact->nro_documento ?? '') }}" required maxlength="8">
    @error('nro_documento')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="correo" class="form-label">Correo</label>
    <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo', $contact->correo ?? '') }}">
    @error('correo')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="telefono" class="form-label">Teléfono</label>
    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $contact->telefono ?? '') }}" maxlength="9">
    @error('telefono')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Guardar' }}</button>
<a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancelar</a>
