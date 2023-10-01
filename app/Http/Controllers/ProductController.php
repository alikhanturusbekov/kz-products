<?php

namespace App\Http\Controllers;

use App\Http\Constants\ProductMessage;
use App\Http\Requests\Product\DestroyRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => Product::latestFiltered(request(['tag', 'search']), 8)]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function manage()
    {
        return view('products.manage', ['products' => auth()->user()->products()->get()]);
    }

    public function store(StoreRequest $request)
    {
        $product = $request->validated();
        $product['photo'] = $request->hasFile('photo') ? $request->file('photo')->store('photos', 'public') : $product['photo'];
        auth()->user()->products()->create($product);

        return redirect('/')
            ->with('message', ProductMessage::CREATED);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $new_product = $request->validated();
        $new_product['photo'] = $request->hasFile('photo') ? $request->file('photo')->store('photos', 'public') : $product['photo'];
        $product->update($new_product);

        return redirect('/')
            ->with('message', ProductMessage::UPDATED);
    }

    public function destroy(DestroyRequest $request, Product $product)
    {
        $product->delete();

        return redirect('/')
            ->with('message', ProductMessage::DELETED);
    }
}
