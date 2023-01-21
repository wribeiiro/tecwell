<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')
                            ->orderBy('id', 'DESC')
                            ->filter(request(['tag', 'search']))
                            ->paginate(20);

        return view('products.index', ['products' => $products]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'description',
            'category_id' => 'required',
            'contract' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request
                ->file('logo')
                ->store('logos', 'public');
        }

        Product::create($formFields);

        return redirect()
            ->route('products.manage')
            ->with('message', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'description' => ['required'],
            'category_id' => 'category_id',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $product->update($formFields);

        return back()->with('message', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.manage')
            ->with('message', 'Product deleted successfully');
    }

    public function manage()
    {
        return view('products.manage', [
            'products' => Product::all()
        ]);
    }
}
