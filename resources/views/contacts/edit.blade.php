@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Editar Contacto</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @method('PUT')
        @include('contacts.form', ['submitButtonText' => 'Actualizar'])
    </form>
</div>
@endsection
