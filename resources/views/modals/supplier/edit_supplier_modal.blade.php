<div class="modal fade" id="editSupplierModal" tabindex="-1" aria-labelledby="editSupplierModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" data-controller="form-validation">
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
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="company_name" name="company_name" data-supplier-target="supplierName" data-action="input->form-validation#validateCompanyNameField">
                <div class="invalid-feedback" id="companyNameFeedback"></div>
              </div>
            </div>
            <div class="col-6 fw-bold">
              <div class="mb-3">
                <label for="company_abbreviation" class="form-label">Company Abbreviation</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="company_abbreviation" name="company_abbreviation" data-supplier-target="supplierAbbreviation" data-action="input->form-validation#validateCompanyAbbreviationField">
                <div class="invalid-feedback" id="companyAbbreviationFeedback"></div>
              </div>
            </div>
          </div>
          <div class="mb-3 fw-bold">
            <label for="email_address" class="form-label">Email</label>
            <input type="email_address" class="form-control fw-bold text-dark is-valid" id="email_address" name="email_address" data-supplier-target="supplierEmail" data-action="input->form-validation#validateEmailAddressField">
            <div class="invalid-feedback" id="emailFeedback"></div>
          </div>
          <hr class="fw-bold text-white"></hr>
          <h6 class="mt-2 fw-bold text-light">Edit Supplier's Address Information</h6>
          <div class="row g-2 fw-bold">
            <div class="col-6">
              <div class="mb-3">
                <label for="streetOne" class="form-label">Street One</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="street_one" name="street_one" data-supplier-target="supplierStreetOne" data-action="input->form-validation#validateStreetOneField">
                <div class="invalid-feedback" id="streetOneFeedback"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="streetTwo" class="form-label">Street Two</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="street_two"
                  name="street_two"data-supplier-target="supplierStreetTwo" data-action="input->form-validation#validateStreetTwoField">
                <div class="invalid-feedback" id="streetTwoFeedback"></div>
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="municipality" class="form-label">Municipality</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="municipality" name="municipality" data-supplier-target="supplierMunicipality" data-action="input->form-validation#validateMunicipalityField">
                <div class="invalid-feedback" id="municipalityFeedback"></div>
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="city" name="city" data-supplier-target="supplierCity" data-action="input->form-validation#validateCityField">
                <div class="invalid-feedback" id="cityFeedback"></div>
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="zipCode" class="form-label">Zip Code</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="zip_code" name="zip_code" data-supplier-target="supplierZipCode" data-action="input->form-validation#validateZipCodeField">
                <div class="invalid-feedback" id="zipCodeFeedback"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="createOrUpdateButton" data-action="click->supplier#enableFields">Update Supplier</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-action="click->supplier#enableFields click->form-validation#resetFields">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>