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

<div class="card-body d-flex flex-wrap" id="product-display-lists">
  <ul class="product-list d-flex flex-wrap" data-pos-target="productList">
    @foreach ($products as $product)
      <li data-product-name="{{$product->name}}" data-product-barcode="{{$product->bar_code}}">
        <div class="product-card d-flex flex-column align-items-center m-1 p-1 text-dark" id= "product[{{$product->id}}]" name="product[{{$product->name}}]"
        data-action="click->pos#addProductAsOrderItem"
        data-product-id="{{$product->id}}"
        data-product-name="{{$product->name}}"
        data-product-price="{{$product->unit_price}}"
        data-product-quantity="{{$product->quantity}}"
        data-product-barcode="{{$product->bar_code}}">
          <img src="{{ asset('/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px;">
          <p class="text-center mt-2">{{ $product->name }}({{$product->quantity}})</p>
          <p class="text-center">Price: ₱{{ $product->unit_price }}</p>
        </div>
      </li>
    @endforeach
    <li class="no-results d-none d-flex justify-content-center ms-5 fs-5" data-pos-target="noResults">
      <p class="d-flex flex-row align-items-center fw-bold"> No products record found with <span class="search-term badge text-wrap text-bg-info ms-1 me-1"></span> as product's name or barcode.</p>
    </li>
  </ul>
</div>
<div class="text-end m-4" id="paginationButton">
  <button type="button" class="btn btn-primary me-2 d-none" id="prevButton" data-action="click->pos#previousPage">Prev</button>
  <button type="button" class="btn btn-primary" id="nextButton" data-action="click->pos#nextPage">Next</button>
</div>