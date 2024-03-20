<form>
  <div class="card-body">
    <h6 class="mt-2 fw-bold text-dark">Order Information</h6>
    <div class="row">
      <div class="col-6">
        <div class="mb-3 fw-bold text-dark">
          <label for="customer_id" class="form-label">Customer:</label>
          <select name="customer_id" id="customer_id" class="form-control text-dark" required data-pos-target="customerSelect">
            <option class="text-dark"value="">Select a customer</option>
            @foreach ($customers as $customer)
              <option class="text-dark" value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3 fw-bold text-dark">
          <label for="product_id" class="form-label">Product to Order:</label>
          <select name="product_id" id="product_id" class="form-control text-dark" required data-pos-target="productSelect" data-action="change->pos#updateTotalCost">
            <option value=""disabled selected hidden>Select a product to order</option>
            @foreach($products as $product)
              <option value="{{ $product->id }}" data-unit-price="{{ $product->unit_price }}">{{ $product->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="mb-3 fw-bold text-dark">
          <label for="quantity" class="form-label">Quantity:</label>
          <input type="number" class="form-control text-dark" id="quantity" name="quantity" required placeholder="Quantity" data-pos-target="quantity" data-action="input->pos#updateTotalCost" >
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3 fw-bold text-dark">
          <label for="total_cost" class="form-label">Total Cost:</label>
          <input type="number" class="form-control text-dark" id="total_cost" name="total_cost" required placeholder="Total Cost" data-pos-target="totalCost" step="any">
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer text-end">
    <button class="btn btn-primary" dat-action="click->pos#updateCustomerName">Place Order</button>
    <button type="button" class="btn btn-secondary"data-action="click->pos#clearCustomerField">Cancel</button>
  </div>
</form>