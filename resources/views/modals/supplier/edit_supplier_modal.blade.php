<div class="modal fade" id="editSupplierModal" tabindex="-1" aria-labelledby="editSupplierModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4>Edit Supplier's Information</h4>
      </div>
      <form method="POST" action="{{ route('suppliers.update', ['supplier' => '__SUPPLIER_ID__']) }}" id="editSupplierForm">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row g-2">
            <h6 class="mt-2 fw-bold text-light">Edit Supplier's Personal Information</h6>
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="company_name" class="form-label">First Name</label>
                <input type="text" class="form-control fw-bold text-dark" id="company_name" name="company_name" data-supplier-target="supplierName">
              </div>
            </div>
            <div class="col-6 fw-bold">
              <div class="mb-3">
                <label for="company_abbreviation" class="form-label">Last Name</label>
                  <input type="text" class="form-control fw-bold text-dark" id="company_abbreviation" name="company_abbreviation" data-supplier-target="supplierAbbreviation">
              </div>
            </div>
          </div>
          <div class="mb-3 fw-bold">
            <label for="email_address" class="form-label">Email</label>
            <input type="email_address" class="form-control fw-bold text-dark" id="email_address" name="email_address" data-supplier-target="supplierEmail">
          </div>
          <hr class="fw-bold text-white"></hr>
          <h6 class="mt-2 fw-bold text-light">Edit Supplier's Address Information</h6>
          <div class="row g-2 fw-bold">
            <div class="col-6">
              <div class="mb-3">
                <label for="streetOne" class="form-label">Street One</label>
                <input type="text" class="form-control fw-bold text-dark" id="street_one" name="street_one" data-supplier-target="supplierStreetOne">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="streetTwo" class="form-label">Street Two</label>
                  <input type="text" class="form-control fw-bold text-dark" id="street_two" name="street_two"data-supplier-target="supplierStreetTwo">
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="municipality" class="form-label">Municipality</label>
                <input type="text" class="form-control fw-bold text-dark" id="municipality" name="municipality" data-supplier-target="supplierMunicipality">
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control fw-bold text-dark" id="city" name="city" data-supplier-target="supplierCity">
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="zipCode" class="form-label">Zip Code</label>
                <input type="text" class="form-control fw-bold text-dark" id="zip_code" name="zip_code" data-supplier-target="supplierZipCode">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Supplier</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>