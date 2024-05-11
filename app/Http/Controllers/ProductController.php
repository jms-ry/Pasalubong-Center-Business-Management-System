<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
  /**
    * Display a listing of the resource.
  */
  public function index(Request $request)
  {
    Session::flash('index_success', 'You are currently viewing the products page!');
  
    $suppliers = Supplier::all();
  
    $query = Product::query(); // Use Eloquent query builder
  
    if ($request->has('date')) {
      $date = $request->get('date');
      $query->whereDate('delivered_date', $date);
    }
  
    if ($request->filled('search')) {
      $query->where('name', 'like', '%' . $request->search . '%');
    }
  
    if ($request->filled('sort')) {
      $sortColumn = $request->input('sort');
      $sortDirection = $request->input('direction', 'asc');
      $query->orderBy($sortColumn, $sortDirection);
    } else {
      $query->orderBy('id', 'asc');
    }
  
    $products = $query->paginate(10)->withQueryString();
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
    $requestData = $request->all();

    if ($request->hasFile('image')) {
        // Store the uploaded image in the storage directory
        $imagePath = $request->file('image')->store('public/product_images');

        // Get the actual path in the storage directory
        $actualPath = str_replace('public/', 'storage/', $imagePath);

        // Set the image path in the request data
        $requestData['image'] = $actualPath;
    }

    // Create the product with the updated request data
    $product = Product::create($requestData);

    DB::table('logs')->insert([
        'user_id' => Auth::id(),
        'action' => 'Created new product, ' . $product->name,
        'logged_date' => now()->toDateString(),
        'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->back()->with('create_success', 'Product ' . $product->name . ' was created successfully');
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
    // Handle image upload
    if ($request->hasFile('image')) {
      // Store the new uploaded image in the storage directory
      $imagePath = $request->file('image')->store('public/product_images');

      // Delete the previous image if it exists
      if ($product->image) {
        Storage::disk('public')->delete($product->image);
      }

      // Update the product with the new image path
      $product->update(array_merge($request->all(), ['image' => str_replace('public/', 'storage/', $imagePath)]));
    } else {
      // If no new image is uploaded, update the product without changing the image
      $product->update($request->all());
    }

    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Updated product whose id is ' . $product->id,
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->back()->with('success', 'Product with id of ' . $product->id . ' was updated successfully');
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
    return redirect()->back()->with('success', 'Product was deleted successfully');
  }
}
