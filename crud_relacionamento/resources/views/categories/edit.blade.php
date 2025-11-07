@extends('layout')

@section('content')
<h2>Editar Categoria</h2>

<form action="{{ route('categories.update', $category) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nome da Categoria</label>
        <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
