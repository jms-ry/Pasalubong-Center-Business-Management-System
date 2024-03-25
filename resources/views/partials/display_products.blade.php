<style>
  .product-card:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow on hover */
    transition: box-shadow 0.3s ease; /* Smooth transition */
  }
</style>

<div class="card-body d-flex flex-wrap">
  @foreach($products as $product)
    <div class="product-card d-flex flex-column align-items-center m-2 p-2">
      <img src="{{ url('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 150px; height: 150px;" >
      <p class="text-center mt-2">{{ $product->name }} ({{ $product->quantity }})</p>
      <p class="text-center">Price: ₱{{ $product->unit_price }}</p>
    </div>
  @endforeach
</div>
<div class="d-flex justify-content-end mt-3 me-3">
  {{ $products->links() }}
</div>
