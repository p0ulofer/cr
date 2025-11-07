<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Carrega todos os produtos com suas categorias
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // Carrega todas as categorias para o select
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Cria um novo produto com os nomes de campos corretos
        Product::create([
            'nome' => $request->nome,
            'value' => $request->value,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update([
            'nome' => $request->nome,
            'value' => $request->value,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
