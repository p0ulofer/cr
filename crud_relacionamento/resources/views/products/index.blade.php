@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Produtos</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success">+ Novo Produto</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->nome }}</td>
            <td>R$ {{ number_format($product->value, 2, ',', '.') }}</td>
            <td>{{ $product->category->nome }}</td>
            <td class="text-center">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Deseja excluir este produto?')" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
