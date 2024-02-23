<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        
        $suppliers = Supplier::all();

        $query = Product::search($request->filled('search') ? $request->search : '');

        if ($request->filled('sort')) {
            $sortColumn = $request->input('sort');
            $sortDirection = $request->input('direction', 'asc'); 
      
            $query->orderBy($sortColumn, $sortDirection);
          }else{
            $query->orderBy('id', 'asc');
          }

        $products = $query->paginate(5)->withQueryString();
        $products->load('supplier');
        
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
        if (Gate::denies('admin-access-only', Auth::user())) {
            return redirect()->back()->with('error', 'Unauthorized action! Only users with an admin role are allowed for this action.');
        }
        $product = Product::create($request->all());

        DB::table('logs')->insert([
            'user_id' =>Auth::id(),
            'action' => 'Created new product, ' . $product->name,
            'logged_date' => now()->toDateString(),
            'logged_time' => now()->toTimeString(),
        ]);
        return redirect()->back()->with('success', 'Product was created successfully');
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
        if (Gate::denies('admin-access-only', Auth::user())) {
            return redirect()->back()->with('error', 'Unauthorized action! Only users with an admin role are allowed for this action.');
        }
        $product->update($request->all());
        DB::table('logs')->insert([
            'user_id' => Auth::id(),
            'action' => 'Updated product whose id is ' . $product->id . '',
            'logged_date' => now()->toDateString(),
            'logged_time' => now()->toTimeString(),
        ]);
        
        return redirect()->back()->with('success', 'Product was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (Gate::denies('admin-access-only', Auth::user())) {
            return redirect()->back()->with('error', 'Unauthorized action! Only users with an admin role are allowed for this action.');
        }
        $product->delete();

        DB::table('logs')->insert([
            'user_id' => Auth::id(),
            'action' => 'Deleted product, ' . $product->name . ' ' ,
            'logged_date' => now()->toDateString(),
            'logged_time' => now()->toTimeString(),
        ]);
    return redirect()->back()->with('success', 'Product was deleted successfully');
    }
}
