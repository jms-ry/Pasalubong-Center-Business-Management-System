<div class="modal fade" id="viewReceiptModal" tabindex="-1" aria-labelledby="viewReceiptModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h6 class="mt-2 fw-bold text-light">Receipt's Information of <span class="ms-1 me-1 text-primary fw-bold" data-product-sales-target="customerName">Customer's Name</span> Order</h6>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-6">
            <div class="mb-3 fw-bold">
              <label for="order_number" class="form-label">Order Number: </label>
              <span class="ms-2 text-white fw-bold" data-product-sales-target="orderNumberId"></span>
            </div>
          </div>
          <div class="col-6">
            <div class="mb-3 fw-bold">
              <label for="orderdate" class="form-label">Order Date: </label>
              <span class="ms-2 text-white fw-bold" data-product-sales-target="orderDate"></span>
            </div>
          </div>
        </div>
        <div class="row g-2">
          <div class="col-6">
            <div class="mb-3 fw-bold">
              <label for="order_time" class="form-label">Total Price: </label>
              <span class="ms-2 text-white fw-bold" data-product-sales-target="orderTime"></span>
            </div>
          </div>
          <div class="col-6">
            <div class="mb-3 fw-bold">
              <label for="user_name" class="form-label">Cashier's Name: </label>
              <span class="ms-2 text-white fw-bold" data-product-sales-target="userName"></span>
            </div>
          </div>
        </div>
        <hr class="fw-bold text-white"></hr>
        <h6 class="mt-2 fw-bold text-light">Ordered Product's Information</h6>
        <table class="table table-stripped table-hover table-primary border border-dark text-light">
          <thead>
            <tr>
              <th>Product Name</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Total Price</th>
            </tr>
          </thead>
          <tbody id="viewOrderItemsTable">

          </tbody>
          <tr>
            <td></td>
            <td></td>
            <td class="fw-bold text-dark">Total: <span data-product-sales-target="total">₱00.00</span></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>