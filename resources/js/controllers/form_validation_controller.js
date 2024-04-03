import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="form-validation"
export default class extends Controller {
  connect() {
  }

  validateFields(){
    const firstNameField = this.element.querySelector('#first_name');
    const lastNameField = this.element.querySelector('#last_name');
  }
}
