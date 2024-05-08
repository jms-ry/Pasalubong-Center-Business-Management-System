<style>
  .product-card:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow on hover */
    transition: box-shadow 0.3s ease; /* Smooth transition */
  }
  .product-card.disabled {
  pointer-events: none; /* Disable pointer events */
  opacity: 0.6; /* Reduce opacity to visually indicate disabled state */
}

</style>

<div class="card-body d-flex flex-wrap">
  @foreach($products as $product)
    <div class="product-card d-flex flex-column align-items-center m-2 p-2 text-dark" id= "product[{{$product->id}}]" name="product[{{$product->name}}]"
    data-action="click->pos#addProductAsOrderItem"
    data-product-id="{{$product->id}}"
    data-product-name="{{$product->name}}"
    data-product-price="{{$product->unit_price}}"
    data-product-quantity="{{$product->quantity}}">
      <img src="{{ asset('/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px;">
      <p class="text-center mt-2">{{ $product->name }}({{$product->quantity}})</p>
      <p class="text-center">Price: ₱{{ $product->unit_price }}</p>
    </div>
  @endforeach
</div>
