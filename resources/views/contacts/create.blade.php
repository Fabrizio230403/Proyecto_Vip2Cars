@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Agregar Contacto</h1>

    <form action="{{ route('contacts.store') }}" method="POST">
        @include('contacts.form', ['submitButtonText' => 'Registrar'])
    </form>
</div>
@endsection
