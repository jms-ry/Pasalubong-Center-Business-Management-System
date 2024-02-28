<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4>Create/Add New Employee</h4>
        </div>
        <form action="{{route('employees.store')}}" method="POST" id="addEmployeeForm">
          @csrf
          <div class="modal-body">
            <h6 class="mt-2 fw-bold text-light">Personal Information</h6>
            <div class="row g-2">
              <div class="col-7">
                <div class="mb-3 fw-bold">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Employee Name">
                </div>
              </div>
              <div class="col-5 fw-bold">
                <label for="role" class="form-label">Role</label>
                  <select name="role" id="role" class="form-select">
                    <option value="admin">Admin</option>
                    <option value="cashier">Cashier</option>
                  </select>
              </div>
            </div>
            <div class="mb-3 fw-bold">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required placeholder="Enter Employee Email">
            </div>
            <hr class="fw-bold text-white"></hr>
            <h6 class="mt-2 fw-bold text-light">Address Information</h6>
            <div class="row g-2 fw-bold">
              <div class="col-6">
                <div class="mb-3">
                  <label for="street_one" class="form-label">Street One</label>
                  <input type="text" class="form-control" id="street_one" name="street_one" required placeholder="Street One">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="street_two" class="form-label">Street Two</label>
                  <input type="text" class="form-control" id="street_two" name="street_two" placeholder="Street Two">
                </div>
              </div>
            </div>
            <div class="row g-2">
              <div class="col-4 fw-bold">
                <div class="mb-3">
                  <label for="municipality" class="form-label">Municipality</label>
                  <input type="text" class="form-control" id="municipality" name="municipality" required placeholder="Municipality">
                </div>
              </div>
              <div class="col-4 fw-bold">
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" name="city" required placeholder="City">
                </div>
              </div>
              <div class="col-4 fw-bold">
                <div class="mb-3">
                  <label for="zip_code" class="form-label">Zip Code</label>
                  <input type="text" class="form-control" id="zip_code" name="zip_code" required placeholder="Zip Code">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" data-action="click->employee#enableFields">Create Employee</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-action="click->employee#enableFields">Cancel</button>
          </div>
        </form>
      </div>
    </div>
</div>