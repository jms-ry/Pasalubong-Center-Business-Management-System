<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('admin-access-only', Auth::user())) {
            return redirect()->back()->with('error', 'You do not have authorization. Access denied!');
        }
        $products = Product::with('supplier')->paginate(5);
        $suppliers = Supplier::all();
        return view('product', compact('products', 'suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        DB::table('logs')->insert([
            'user_id' =>Auth::id(),
            'action' => 'Created new product, ' . $product->name,
            'logged_date' => now()->toDateString(),
            'logged_time' => now()->toTimeString(),
        ]);
        return redirect()->route('products.index')->with('success', 'Product was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        DB::table('logs')->insert([
            'user_id' => Auth::id(),
            'action' => 'Updated product whose id is ' . $product->id . '',
            'logged_date' => now()->toDateString(),
            'logged_time' => now()->toTimeString(),
        ]);
        
        return redirect()->route('products.index')->with('success', 'Product was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        DB::table('logs')->insert([
            'user_id' => Auth::id(),
            'action' => 'Deleted product, ' . $product->name . ' ' ,
            'logged_date' => now()->toDateString(),
            'logged_time' => now()->toTimeString(),
        ]);
    return redirect()->route('products.index')->with('success', 'Product was deleted successfully');
    }
}
