<div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" data-controller="form-validation">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4>Edit Employee's Information</h4>
      </div>
      <form method="POST" action="{{ route('customers.update', ['customer' => '__CUSTOMER_ID__']) }}" id="editCustomerForm">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row g-2">
            <h6 class="mt-2 fw-bold text-light">Edit Customer's Personal Information</h6>
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="first_name" name="first_name" data-customer-target="customerFirstName" data-action="input->form-validation#validateFirstNameField">
                <div class="invalid-feedback" id="firstNameFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
            <div class="col-6 fw-bold">
              <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="last_name" name="last_name" data-customer-target="customerLastName" data-action="input->form-validation#validateLastNameField">
                  <div class="invalid-feedback">
                    <span class="text-danger fw-bold"></span>
                  </div>
              </div>
            </div>
          </div>
          <div class="mb-3 fw-bold">
            <label for="email_address" class="form-label">Email</label>
            <input type="email_address" class="form-control fw-bold text-dark is-valid" id="email_address" name="email_address" data-customer-target="customerEmail" data-action="input->form-validation#validateEmailAddressField">
            <div class="invalid-feedback" id="emailFeedback">
              <span class="text-danger fw-bold"></span>
            </div>
          </div>
          <hr class="fw-bold text-white"></hr>
          <h6 class="mt-2 fw-bold text-light">Edit Customer's Address Information</h6>
          <div class="row g-2 fw-bold">
            <div class="col-6">
              <div class="mb-3">
                <label for="streetOne" class="form-label">Street One</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="street_one" name="street_one" data-customer-target="customerStreetOne" data-action="input->form-validation#validateStreetOneField">
                <div class="invalid-feedback" id="streetOneFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="streetTwo" class="form-label">Street Two</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="street_two" name="street_two"data-customer-target="customerStreetTwo" data-action="input->form-validation#validateStreetTwoField">
                <div class="invalid-feedback" id="streetTwoFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="municipality" class="form-label">Municipality</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="municipality" name="municipality" data-customer-target="customerMunicipality" data-action="input->form-validation#validateMunicipalityField">
                <div class="invalid-feedback" id="municipalityFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="city" name="city" data-customer-target="customerCity" data-action="input->form-validation#validateCityField">
                <div class="invalid-feedback" id="cityFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="zipCode" class="form-label">Zip Code</label>
                <input type="text" class="form-control fw-bold text-dark is-valid" id="zip_code" name="zip_code" data-customer-target="customerZipCode" data-action="input->form-validation#validateZipCodeField">
                <div class="invalid-feedback" id="zipCodeFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="createOrUpdateButton" data-action="click->customer#enableFields">Update Customer</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-action="click->customer#enableFields click->form-validation#resetFields">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>