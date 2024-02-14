<div class="modal fade" id="viewCustomerModal" tabindex="-1" aria-labelledby="viewCustomerModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h6 class="mt-2 fw-bold text-light">Customer's Personal Information</h6>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-6">
                        <div class="mb-3 fw-bold">
                            <label for="first_name" class="form-label">First Name: </label>
                            <span class= "ms-2 text-white fw-bold" data-target="customer.firstName"></span>
                        </div>
                    </div>
                    <div class="col-6 fw-bold">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name: </label>
                            <span class= "ms-2 text-white fw-bold" data-target="customer.lastName"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 fw-bold">
                    <label for="email_address" class="form-label">Email: </label>
                    <span class= "text-white fw-bold" data-target="customer.email"></span>
                </div>
                <hr class="fw-bold text-white"></hr>
                <h6 class="mt-2 fw-bold text-light">Address Information</h6>
                <div class="row g-2 fw-bold">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="streetOne" class="form-label">Street One: </label>
                            <span class= "ms-2 text-white fw-bold" data-target="customer.streetOne"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="streetTwo" class="form-label">Street Two: </label>
                            <span  class= "ms-2 text-white fw-bold" data-target="customer.streetTwo"></span>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-6 fw-bold">
                        <div class="mb-3">
                            <label for="municipality" class="form-label">Municipality: </label>
                            <span class= "ms-2 text-white fw-bold" data-target="customer.municipality"></span>
                        </div>
                    </div>
                    <div class="col-6 fw-bold">
                        <div class="mb-3">
                            <label for="zipCode" class="form-label">Zip Code: </label>
                            <span class= "ms-2 text-white fw-bold" data-target="customer.zipCode"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City: </label>
                        <span class= "ms-2 text-white fw-bold" data-target="customer.city"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
