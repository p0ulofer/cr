@extends('layout')

@section('content')
<h2>Nova Categoria</h2>

<form action="{{ route('categories.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome da Categoria</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
