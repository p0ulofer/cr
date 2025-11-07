@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Categorias</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-success">+ Nova Categoria</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td class="text-center">
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Deseja excluir esta categoria?')" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
