<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" data-controller="form-validation">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4>Edit Product's Information</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('products.update',['product' =>'__PRODUCT_ID__'])}}" method="POST" id="editProductForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <h6 class="mt-2 fw-bold text-light">Edit Product's Information</h6>
          <div class="row g-2">
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="bar_code" class="form-label">Bardcode</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="bar_code" name="bar_code" data-product-target="productBarCode" data-action="input->form-validation#validateBarCodeField">
                <div class="invalid-feedback" id="barCodeFeedback"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="name" name="name" data-product-target="productName" data-action="input->form-validation#validateProductNameField">
                <div class="invalid-feedback" id="productNameFeedback"></div>
              </div>
            </div>
          </div>
          <div class="mb-3 fw-bold">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control fw-bold text-dark is-valid" id="description" name="description" data-product-target="productDescription" data-action="input->form-validation#validateDescriptionField"></textarea>
            <div class="invalid-feedback" id="descriptionFeedback"></div>
          </div>
          <div class="mb-3 fw-bold">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control is-valid" id="image" name="image" accept="image/*" data-product-target="productImage" data-action="input->form-validation#validateProductImageField">
            <small class="form-text text-muted">Accepted formats: JPEG, PNG. Max file size: 2MB.</small>
            <div class="invalid-feedback" id="productImageFeedback"></div>
          </div>
          <div class="row g-2">
            <div class="col-4">
              <div class="mb-3 fw-bold">
                <label for="unit" class="form-label">Unit</label>
                <select name="unit" id="unit" class="form-select fw-bold text-dark is-valid" data-product-target="productUnit" data-action="change->form-validation#validateProductUnitField">
                  <option value="pack">Pack</option>
                  <option value="piece">Piece</option>
                  <option value="bottle">Bottle</option>
                  <option value="box">Box</option>
                </select>
                <div class="invalid-feedback" id="productUnitFeedback"></div>
              </div>
            </div>
            <div class="col-4">
              <div class="mb-3 fw-bold">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control fw-bold text-dark is-valid" id="quantity" name="quantity" data-product-target="productQuantity" data-action="input->form-validation#validateProductQuantityField">
                <div class="invalid-feedback" id="productQuantityFeedback"></div>
              </div>
            </div>
            <div class="col-4">
              <div class="mb-3 fw-bold">
                <label for="unit_price" class="form-label">Unit Price</label>
                <input type="number" class="form-control fw-bold text-dark is-valid" id="unit_price" name="unit_price" min="1" step="0.01" data-product-target="productUnitPrice" data-action="input->form-validation#validateProductUnitPriceField">
                <div class="invalid-feedback" id="productUnitPriceFeedback"></div>
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="delivered_date" class="form-label">Delivered Date</label>
                <input type="datetime-local" name="delivered_date" class="form-control fw-bold text-dark is-valid" id="delivered_date" data-product-target="productDeliveredDate" data-action="input->form-validation#validateDeliveredDateField">
                <div class="input-feedback" id="deliveredDateFeedback"></div>  
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="supplier" class="form-label">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-select fw-bold text-dark is-valid" data-product-target="productSupplierName" data-action="change->form-validation#validateSupplierField">
                  <option value="selected">Select Supplier</option>
                  @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->company_name }} ({{ $supplier->company_abbreviation }})</option>
                  @endforeach
                </select>
                <div class="invalid-feedback" id="supplierFeedback"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="createOrUpdateButton" data-action="click->product#enableFields">Update Product</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-action="click->product#enableFields click->form-validation#resetFields">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>