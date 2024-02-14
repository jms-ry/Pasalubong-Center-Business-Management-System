<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h6 class="mt-2 fw-bold text-light">Customer's Personal Information</h6>
            </div>
            <form action="{{ route('customers.store') }}" method="POST" id="addCustomerForm">
                @csrf
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="mb-3 fw-bold">
                                <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-6 fw-bold">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Enter Last Name">
                            </div>
                        </div>
                </div>
                <div class="mb-3 fw-bold">
                    <label for="email_address" class="form-label">Email</label>
                        <input type="email_address" class="form-control" id="email_address" name="email_address" required placeholder="Enter Email Address">
                </div>
                <hr class="fw-bold text-white"></hr>
                <h6 class="mt-2 fw-bold text-light">Address Information</h6>
                <div class="row g-2 fw-bold">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="streetOne" class="form-label">Street One</label>
                                <input type="text" class="form-control" id="streetOne" name="streetOne" required placeholder="Street One">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="streetTwo" class="form-label">Street Two</label>
                                <input type="text" class="form-control" id="streetTwo" name="streetTwo" placeholder="Street Two">
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
                            <label for="zipCode" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="zipCode" name="zipCode" required placeholder="Zip Code">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create Customer</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
</div>