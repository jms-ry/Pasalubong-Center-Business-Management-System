<div class="modal fade" id="viewCustomerModal" tabindex="-1" aria-labelledby="viewCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h6 class="mt-2 fw-bold text-light">Customer's Personal Information</h6>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-6">
                        <div class="mb-3 fw-bold">
                            <label for="first_name" class="form-label">First Name</label>
                            <span id="view_first_name"></span>
                        </div>
                    </div>
                    <div class="col-6 fw-bold">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <span id="view_last_name"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 fw-bold">
                    <label for="email_address" class="form-label">Email</label>
                    <span id="view_email_address"></span>
                </div>
                <hr class="fw-bold text-white"></hr>
                <h6 class="mt-2 fw-bold text-light">Address Information</h6>
                <div class="row g-2 fw-bold">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="streetOne" class="form-label">Street One</label>
                            <span id="view_streetOne"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="streetTwo" class="form-label">Street Two</label>
                            <span id="view_streetTwo"></span>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-4 fw-bold">
                        <div class="mb-3">
                            <label for="municipality" class="form-label">Municipality</label>
                            <span id="view_municipality"></span>
                        </div>
                    </div>
                    <div class="col-4 fw-bold">
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <span id="view_city"></span>
                        </div>
                    </div>
                    <div class="col-4 fw-bold">
                        <div class="mb-3">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <span id="view_zipCode"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
