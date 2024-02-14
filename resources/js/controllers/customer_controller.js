import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="customer"
export default class extends Controller {
    static targets = ['firstName', 'lastName', 'email', 'streetOne', 'streetTwo', 'municipality', 'city', 'zipCode'];

    connect() {
        console.log('Customer Controller connected!');
    }

    updateModal(event) {
        const customerData = event.currentTarget.dataset.customer;

        if (customerData) {
            const customer = JSON.parse(customerData);

            this.firstNameTarget.textContent = customer.first_name || '';
            this.lastNameTarget.textContent = customer.last_name || '';
            this.emailTarget.textContent = customer.email_address || '';

            // Check if the customer has an associated address
            if (customer.address) {
                const address = customer.address;

                this.streetOneTarget.textContent = address.street_one || '';
                this.streetTwoTarget.textContent = address.street_two || '';
                this.municipalityTarget.textContent = address.municipality || '';
                this.cityTarget.textContent = address.city || '';
                this.zipCodeTarget.textContent = address.zip_code || '';
            } else {
                // Handle the case where the customer does not have an associated address
                this.streetOneTarget.textContent = '';
                this.streetTwoTarget.textContent = '';
                this.municipalityTarget.textContent = '';
                this.cityTarget.textContent = '';
                this.zipCodeTarget.textContent = '';
            }
        }
    }
}
