<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" data-controller="form-validation">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4>Add/Create New Supplier</h4>
      </div>
      <form action="{{route('suppliers.store')}}" method="POST" id="addSupplierForm">
        @csrf
        <div class="modal-body">
          <h6 class="mt-2 fw-bold text-light">Supplier's Company Information</h6>
          <div class="row g-2">
            <div class="col-7">
              <div class="mb-3 fw-bold">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" required placeholder="Enter Company Name" data-action="input->form-validation#validateCompanyNameField">
                <div class="invalid-feedback" id="companyNameFeedback"></div>
              </div>
            </div>
            <div class="col-5 fw-bold">
              <div class="mb-3">
                <label for="last_name" class="form-label">Company Abbreviation</label>
                <input type="text" class="form-control" id="company_abbreviation" name="company_abbreviation" required placeholder="Enter Company Abbreviation" data-action="input->form-validation#validateCompanyAbbreviationField">
                <div class="invalid-feedback" id="companyAbbreviationFeedback"></div>
              </div>
            </div>
          </div>
          <div class="mb-3 fw-bold">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email_address" name="email_address" required placeholder="Enter Email Address" data-action="input->form-validation#validateEmailAddressField">
            <div class="invalid-feedback" id="emailFeedback"></div>
          </div>
          <hr class="fw-bold text-white"></hr>
          <h6 class="mt-2 fw-bold text-light">Company's Address Information</h6>
          <div class="row g-2 fw-bold">
            <div class="col-6">
              <div class="mb-3">
                <label for="street_one" class="form-label">Street One</label>
                <input type="text" class="form-control" id="street_one" name="street_one" required placeholder="Street One" data-action="input->form-validation#validateStreetOneField">
                <div class="invalid-feedback" id="streetOneFeedback"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="street_twp" class="form-label">Street Two</label>
                <input type="text" class="form-control" id="street_two" name="street_two" placeholder="Street Two" data-action="input->form-validation#validateStreetTwoField">
                <div class="invalid-feedback" id="streetTwoFeedback"></div>
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="municipality" class="form-label">Municipality</label>
                <input type="text" class="form-control" id="municipality" name="municipality" required placeholder="Municipality" data-action="input->form-validation#validateMunicipalityField">
                <div class="invalid-feedback" id="municipalityFeedback"></div>
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required placeholder="City" data-action="input->form-validation#validateCityField">
                <div class="invalid-feedback" id="cityFeedback"></div>
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="zip_code" class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" required placeholder="Zip Code" data-action="input->form-validation#validateZipCodeField">
                <div class="invalid-feedback" id="zipCodeFeedback"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="createOrUpdateButton" data-action="click->supplier#enableFields">Create Supplier</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-action="click->supplier#enableFields click->form-validation#clearFields">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>