<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" data-controller="form-validation">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4>Edit Employee's Information</h4>
        </div>
        <form action="{{route('employees.update',['employee' =>'__EMPLOYEE_ID__'])}}" method="POST" id="editEmployeeForm">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <h6 class="mt-2 fw-bold text-light">Edit Employee's Personal Information</h6>
            <div class="row g-2">
              <div class="col-7">
                <div class="mb-3 fw-bold">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="name" name="name" data-employee-target="employeeName"data-action="input->form-validation#validateNameField">
                  <div class="invalid-feedback" id="nameFeedback"></div>
                </div>
              </div>
              <div class="col-5 fw-bold">
                <label for="role" class="form-label">Role</label>
                  <select name="role" id="role" class="form-select fw-bold text-dark is-valid" data-employee-target="employeeRole" data-action="change->form-validation#validateRoleField">
                    <option value="admin">Admin</option>
                    <option value="cashier">Cashier</option>
                  </select>
                  <div class="invalid-feedback" id="roleFeedback"></div>
              </div>
            </div>
            <div class="mb-3 fw-bold">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control fw-bold text-dark is-valid" id="email" name="email" data-employee-target="employeeEmail" data-action="input->form-validation#validateEmailAddressField">
              <div class="invalid-feedback" id="emailFeedback"></div>
            </div>
            <hr class="fw-bold text-white"></hr>
            <h6 class="mt-2 fw-bold text-light">Edit Employee's Address Information</h6>
            <div class="row g-2 fw-bold">
              <div class="col-6">
                <div class="mb-3">
                  <label for="street_one" class="form-label">Street One</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="street_one" name="street_one" data-employee-target="employeeStreetOne" data-action="input->form-validation#validateStreetOneField">
                  <div class="invalid-feedback" id="streetOneFeedback"></div>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="street_two" class="form-label">Street Two</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="street_two" name="street_two" data-employee-target="employeeStreetTwo" data-action="input->form-validation#validateStreetTwoField">
                  <div class="invalid-feedback" id="streetTwoFeedback"></div>
                </div>
              </div>
            </div>
            <div class="row g-2">
              <div class="col-4 fw-bold">
                <div class="mb-3">
                  <label for="municipality" class="form-label">Municipality</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="municipality" name="municipality" data-employee-target="employeeMunicipality" data-action="input->form-validation#validateMunicipalityField">
                  <div class="invalid-feedback" id="municipalityFeedback"></div>
                </div>
              </div>
              <div class="col-4 fw-bold">
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="city" name="city" data-employee-target="employeeCity" data-action="input->form-validation#validateCityField">
                  <div class="invalid-feedback" id="cityFeedback"></div>
                </div>
              </div>
              <div class="col-4 fw-bold">
                <div class="mb-3">
                  <label for="zip_code" class="form-label">Zip Code</label>
                  <input type="text" class="form-control fw-bold text-dark is-valid" id="zip_code" name="zip_code" data-employee-target="employeeZipCode" data-action="input->form-validation#validateZipCodeField">
                  <div class="invalid-feedback" id="zipCodeFeedback"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="createOrUpdateButton"data-action="click->employee#enableFields">Update Employee</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-action="click->employee#enableFields click->form-validation#resetFields">Cancel</button>
          </div>
        </form>
      </div>
    </div>
</div>