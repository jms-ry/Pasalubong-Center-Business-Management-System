<style>
  .product-card:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow on hover */
    transition: box-shadow 0.3s ease; /* Smooth transition */
  }
</style>

<div class="card-body d-flex flex-wrap">
  @foreach($products as $product)
    <div class="product-card d-flex flex-column align-items-center m-2 p-2" id= "product[{{$product->id}}]" name="product[{{$product->name}}]"
    data-action="click->pos#addProductToOrder"
    data-product-id="{{$product->id}}"
    data-product-name="{{$product->name}}"
    data-product-price="{{$product->unit_price}}">
      <img src="{{ url('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px;" >
      <p class="text-center mt-2">{{ $product->name }}</p>
      <p class="text-center">Price: ₱{{ $product->unit_price }}</p>
    </div>
  @endforeach
</div>
