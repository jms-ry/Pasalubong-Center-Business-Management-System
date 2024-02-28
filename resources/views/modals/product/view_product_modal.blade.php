<div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h6 class="mt-2 fw-bold text-light">Product's Information</h6>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-5">
            <div class="mb-3 fw-bold">
              <label for="bar_code" class="form-label">Barcode:</label>
              <span class="ms-2 text-white fw-bold" data-product-target="barCode"></span>
            </div>
          </div>
          <div class="col-7">
            <div class="mb-3 fw-bold">
              <label for="name" class="form-label">Product Name:</label>
              <span class="ms-2 text-white fw-bold" data-product-target="name"></span>
            </div>
          </div>
        </div>
        <div class="mb-3 fw-bold">
          <label for="description" class="form-label">Description:</label>
          <span class="ms-2 text-white fw-bold" data-product-target="description"></span>
        </div>
        <hr class="fw-bold text-white"></hr>
        <h6 class="mt-2 fw-bold text-light">Additional Product's Information</h6>
        <div class="row g-2 fw-bold">
          <div class="col-6">
            <div class="mb-3">
              <label for="unit" class="form-label">Product Type/Unit:</label>
              <span class="ms-2 text-white fw-bold" data-product-target="unit"></span>
            </div>
          </div>
          <div class="col-6">
            <div class="mb-3">
              <label for="unit_price" class="form-label">Unit Price:</label>
              <span class="ms-2 text-white fw-bold" data-product-target="unitPrice"></span>
            </div>
          </div>
        </div>
        <div class="row g-2 fw-bold">
          <div class="col-6">
            <div class="mb-3">
              <label for="quantity" class="form-label">Available Quantity:</label>
              <span class="ms-2 text-white fw-bold" data-product-target="quantity"></span>
            </div>
          </div>
          <div class="col-6">
            <div class="mb-3">
              <label for="delivered_date" class="form-label">Delivered Date:</label>
              <span class="ms-2 text-white fw-bold" data-product-target="deliveredDate"></span>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="supplier_id" class="form-label">Supplier's Name:</label>
          <span class="ms-2 text-white fw-bold" data-product-target="supplierName"></span>
        </div>
      </div>
      <div class="modal-footer">
        <form action="{{ route('products.destroy', ['product' => '__PRODUCT_ID__']) }}" method="post" id="deleteProductForm">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>