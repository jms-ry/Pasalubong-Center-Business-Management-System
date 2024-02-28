<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4>Add/Create New Product</h4>
      </div>
      <form action="{{ route('products.store') }}" method="POST" id="addProductForm">
        @csrf
        <div class="modal-body">
          <h6 class="mt-2 fw-bold text-light">Product Information</h6>
          <div class="row g-2">
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="bar_code" class="form-label">Bardcode</label>
                <input type="text" class="form-control" id="bar_code" name="bar_code" required placeholder="Barcode">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Product Name">
              </div>
            </div>
          </div>
          <div class="mb-3 fw-bold">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required placeholder="Description"></textarea>
          </div>
          <div class="row g-2">
            <div class="col-4">
              <div class="mb-3 fw-bold">
                <label for="unit" class="form-label">Unit</label>
                <select name="unit" id="unit" class="form-select">
                  <option value="pack">Pack</option>
                  <option value="piece">Piece</option>
                  <option value="bottle">Bottle</option>
                  <option value="box">Box</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="mb-3 fw-bold">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required placeholder="Quantity">
              </div>
            </div>
            <div class="col-4">
              <div class="mb-3 fw-bold">
                <label for="unit_price" class="form-label">Unit Price</label>
                <input type="number" class="form-control" id="unit_price" name="unit_price" min="1" step="0.01" required placeholder="Unit Price">
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="delivered_date" class="form-label">Delivered Date</label>
                <input type="datetime-local" name="delivered_date" class="form-control" id="delivered_date" required placeholder="Select a date"> 
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-select" required>
                  <option value="selected">Select Supplier</option>
                  @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->company_name }} ({{ $supplier->company_abbreviation }})</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-action="click->product#enableFields">Create Product</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-action="click->product#enableFields">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>