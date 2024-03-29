<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered text-dark fw-bold">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentModalLabel">Enter Payment Amount</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="amount"class="form-label">Payment Amount:</label>
          <input type="number" class="form-control border border-dark" id="amountField" name="amountField"  data-action="input->pos#checkoutOrder" required>
          <input type="hidden" name="amount" id="amount" value>
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary disabled" id="checkOutOrderBtn">Checkout Order</button>
        </div>
      </div>
    </div>
  </div>
</div>
