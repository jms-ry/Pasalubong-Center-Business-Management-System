<div class="modal fade" id="addCustomerModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="addCustomerModalLabel" aria-hidden="true" data-controller="form-validation">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4>Add/Create New Customer</h4>
      </div>
      <form action="{{ route('customers.store') }}" method="POST" id="addCustomerForm">
        @csrf
        <div class="modal-body">
          <h6 class="mt-2 fw-bold text-light">Customer's Personal Information</h6>
          <div class="row g-2">
            <div class="col-6">
              <div class="mb-3 fw-bold">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" data-action="input->pos#removeReminder input->form-validation#validateFirstNameField">
                <div class="invalid-feedback" id="firstNameFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
            <div class="col-6 fw-bold">
              <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Enter Last Name" data-action="input->form-validation#validateLastNameField">
                <div class="invalid-feedback" id="lastNameFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3 fw-bold">
            <label for="email_address" class="form-label">Email</label>
            <input type="email_address" class="form-control" id="email_address" name="email_address" required placeholder="Enter Email Address" data-action="input->form-validation#validateEmailAddressField">
            <div class="invalid-feedback" id="emailFeedback">
              <span class="text-danger fw-bold"></span>
            </div>
          </div>
          <hr class="fw-bold text-white"></hr>
          <h6 class="mt-2 fw-bold text-light">Address Information</h6>
          <div class="row g-2 fw-bold">
            <div class="col-6">
              <div class="mb-3">
                <label for="streetOne" class="form-label">Street One</label>
                <input type="text" class="form-control" id="streetOne" name="streetOne" required placeholder="Street One" data-action="input->form-validation#validateStreetOneField">
                <div class="invalid-feedback" id="streetOneFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="streetTwo" class="form-label">Street Two</label>
                <input type="text" class="form-control" id="streetTwo" name="streetTwo" placeholder="Street Two" data-action="input->form-validation#validateStreetTwoField">
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
                <input type="text" class="form-control" id="municipality" name="municipality" required placeholder="Municipality" data-action="input->form-validation#validateMunicipalityField">
                <div class="invalid-feedback" id="municipalityFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required placeholder="City" data-action="input->form-validation#validateCityField">
                <div class="invalid-feedback" id="cityFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
            <div class="col-4 fw-bold">
              <div class="mb-3">
                <label for="zipCode" class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zipCode" name="zipCode" required placeholder="Zip Code" data-action="input->form-validation#validateZipCodeField">
                <div class="invalid-feedback" id="zipCodeFeedback">
                  <span class="text-danger fw-bold"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="createCustomerReminder">
          <p class="text-danger fw-bold ms-2">Creating new customer will remove all the selected/placed product/s to order.</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="createOrUpdateButton" data-action="click->customer#enableFields">Create Customer</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-action="click->customer#enableFields click->pos#enableField click->form-validation#clearFields">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>