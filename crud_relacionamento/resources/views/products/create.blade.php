@extends('layout')

@section('content')
<h2>Novo Produto</h2>

<form action="{{ route('products.store') }}" method="POST" class="mt-3">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text" id="nome" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="value" class="form-label">Valor</label>
        <input type="number" id="value" name="value" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Categoria</label>
        <select id="category_id" name="category_id" class="form-select" required>
            <option value="">Selecione uma categoria...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
