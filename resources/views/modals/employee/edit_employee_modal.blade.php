<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4>Edit Employee's Information</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                  <input type="text" class="form-control fw-bold text-dark" id="name" name="name" data-employee-target="employeeName">
                </div>
              </div>
              <div class="col-5 fw-bold">
                <label for="role" class="form-label">Role</label>
                  <select name="role" id="role" class="form-select fw-bold text-dark" data-employee-target="employeeRole">
                    <option value="admin">Admin</option>
                    <option value="cashier">Cashier</option>
                  </select>
              </div>
            </div>
            <div class="mb-3 fw-bold">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control fw-bold text-dark" id="email" name="email" data-employee-target="employeeEmail" >
            </div>
            <hr class="fw-bold text-white"></hr>
            <h6 class="mt-2 fw-bold text-light">Edit Employee's Address Information</h6>
            <div class="row g-2 fw-bold">
              <div class="col-6">
                <div class="mb-3">
                  <label for="street_one" class="form-label">Street One</label>
                  <input type="text" class="form-control fw-bold text-dark" id="street_one" name="street_one" data-employee-target="employeeStreetOne" >
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="street_two" class="form-label">Street Two</label>
                  <input type="text" class="form-control fw-bold text-dark" id="street_two" name="street_two" data-employee-target="employeeStreetTwo">
                </div>
              </div>
            </div>
            <div class="row g-2">
              <div class="col-4 fw-bold">
                <div class="mb-3">
                  <label for="municipality" class="form-label">Municipality</label>
                  <input type="text" class="form-control fw-bold text-dark" id="municipality" name="municipality" data-employee-target="employeeMunicipality">
                </div>
              </div>
              <div class="col-4 fw-bold">
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control fw-bold text-dark" id="city" name="city" data-employee-target="employeeCity">
                </div>
              </div>
              <div class="col-4 fw-bold">
                <div class="mb-3">
                  <label for="zip_code" class="form-label">Zip Code</label>
                  <input type="text" class="form-control fw-bold text-dark" id="zip_code" name="zip_code" data-employee-target="employeeZipCode">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Employee</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
</div>