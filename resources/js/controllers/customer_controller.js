import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="customer"
export default class extends Controller {
  static targets = ['firstName','lastName', 'email', 'streetOne', 'streetTwo', 'municipality', 'city', 'zipCode','customerId',   'customerFirstName', 'customerLastName', 'customerEmail', 'customerStreetOne', 'customerStreetTwo', 'customerMunicipality', 'customerCity', 'customerZipCode','searchField','sortField'];

  connect() {
    const createCustomerReminder = this.element.querySelector('#createCustomerReminder');
    createCustomerReminder.classList.add('d-none');
  }

  viewCustomerModal(event) {
    const customerData = event.currentTarget.dataset.customer;
    const customerId = event.currentTarget.dataset.customerId;
    if (customerData) {
      const customer = JSON.parse(customerData);

      const deleteForm = this.element.querySelector('#deleteCustomerForm');
      deleteForm.action = deleteForm.action.replace('__CUSTOMER_ID__', customerId);

      this.firstNameTarget.textContent = customer.first_name || '';
      this.lastNameTarget.textContent = customer.last_name || '';
      this.emailTarget.textContent = customer.email_address || '';

      if (customer.address) {
        const address = customer.address;

        this.streetOneTarget.textContent = address.street_one || '';
        this.streetTwoTarget.textContent = address.street_two || '';
        this.municipalityTarget.textContent = address.municipality || '';
        this.cityTarget.textContent = address.city || '';
        this.zipCodeTarget.textContent = address.zip_code || '';
      } else {     
        this.streetTwoTarget.textContent = '';
        this.municipalityTarget.textContent = '';
        this.cityTarget.textContent = '';
        this.zipCodeTarget.textContent = '';
      }
    }
  }
  editCustomerModal(event) {
    const customerData = event.currentTarget.dataset.customer;
    const customerId = event.currentTarget.dataset.customerId;

    if(customerData)
    {
      const customer = JSON.parse(customerData);
      const editForm = this.element.querySelector('#editCustomerForm');
      editForm.action = editForm.action.replace('__CUSTOMER_ID__', customerId);

      this.customerFirstNameTarget.value = customer.first_name || '';
      this.customerLastNameTarget.value= customer.last_name || '';
      this.customerEmailTarget.value = customer.email_address || '';

      if(customer.address)
      {
        const address = customer.address;

        this.customerStreetOneTarget.value = address.street_one || '';
        this.customerStreetTwoTarget.value = address.street_two || '';
        this.customerMunicipalityTarget.value = address.municipality || '';
        this.customerCityTarget.value = address.city || '';
        this.customerZipCodeTarget.value = address.zip_code || '';
      }
      else
      {
        this.streetOneTarget.value = '';
        this.streetTwoTarget.value = '';
        this.municipalityTarget.value = '';
        this.cityTarget.value = '';
        this.zipCodeTarget.value = '';
      }
    }
    this.disableFields();
  }
  disableFields(){
    this.searchFieldTarget.disabled = true;
    this.sortFieldTarget.disabled = true;
  }

  enableFields() {
    this.searchFieldTarget.disabled = false;
    this.sortFieldTarget.disabled = false;
  }
}
