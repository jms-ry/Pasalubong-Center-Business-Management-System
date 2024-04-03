import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="form-validation"
export default class extends Controller {
  connect() {

    this.checkAllFieldsValidity();

    const fields = this.element.querySelectorAll('.form-control');
    fields.forEach(field => {
      field.addEventListener('input', this.checkAllFieldsValidity.bind(this));
    });

  }

  validateFirstNameField(event) {
    const firstNameField = event.target;
    const inputValue = firstNameField.value.trim();
    
    if (inputValue === '') {
      firstNameField.classList.remove('is-valid');
      firstNameField.classList.add('is-invalid');
      this.element.querySelector('#firstNameFeedback').textContent = 'First Name is required.';
      return; 
    }

    const isValid = /^[a-zA-Z]{3}(?:[a-zA-Z\s]{0,10})?$/.test(inputValue);

    if (isValid) {
      firstNameField.classList.remove('is-invalid');
      firstNameField.classList.add('is-valid');
      this.element.querySelector('#firstNameFeedback').textContent = ''; 
    } else {
      firstNameField.classList.remove('is-valid');
      firstNameField.classList.add('is-invalid');
      this.element.querySelector('#firstNameFeedback' ).textContent = 'First Name is invalid.';
    }
  }

  validateLastNameField(event) {
    const lastNameField = event.target;
    const inputValue = lastNameField.value.trim();
    
    if (inputValue === '') {
      lastNameField.classList.remove('is-valid');
      lastNameField.classList.add('is-invalid');
      this.element.querySelector('#lastNameFeedback').textContent = 'Last Name is required.';
      return; 
    }

    const isValid = /^[a-zA-Z]{3}(?:[a-zA-Z\s]{0,10})?$/.test(inputValue);
    if(isValid){
      lastNameField.classList.remove('is-invalid');
      lastNameField.classList.add('is-valid');
      this.element.querySelector('.invalid-lastname').textContent = '';
    }else{
      lastNameField.classList.remove('is-valid');
      lastNameField.classList.add('is-invalid');
      this.element.querySelector('#lastNameFeedback').textContent = 'Last Name is invalid.';
    }

  }

  validateEmailAddressField(event) {
    const emailAddressField = event.target;
    const inputValue = emailAddressField.value.trim();

    if (inputValue === '') {
      emailAddressField.classList.remove('is-valid', 'is-invalid');
      this.element.querySelector('#emailFeedback').textContent = '';
      return;
    }
    const isValidEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(inputValue);
    
    if (isValidEmail) {
      emailAddressField.classList.remove('is-invalid');
      emailAddressField.classList.add('is-valid');
      this.element.querySelector('#emailFeedback').textContent = 'Email Address is required';
    } else {
      emailAddressField.classList.remove('is-valid');
      emailAddressField.classList.add('is-invalid');
      this.element.querySelector('#emailFeedback').textContent = 'Invalid email address.';
    }
  }

  validateStreetOneField(event) {
    const streetOneField = event.target;
    const inputValue = streetOneField.value.trim();

    if (inputValue === '') {
      streetOneField.classList.remove('is-valid');
      streetOneField.classList.add('is-invalid');
      this.element.querySelector('#streetOneFeedback').textContent = 'Street One is required.';
      return;
    }

    const isValid = /^[a-zA-Z0-9\s]{3,50}$/.test(inputValue);
    if(isValid){
      streetOneField.classList.remove('is-invalid');
      streetOneField.classList.add('is-valid');
      this.element.querySelector('#streetOneFeedback').textContent = '';
    }else{
      streetOneField.classList.remove('is-valid');
      streetOneField.classList.add('is-invalid');
      this.element.querySelector('#streetOneFeedback').textContent = 'Street One is invalid.';
    }
  }

  validateStreetTwoField(event) {
    const streetTwoField = event.target;
    const inputValue = streetTwoField.value.trim();

    if (inputValue === '') {
      streetTwoField.classList.remove('is-valid');
      streetTwoField.classList.add('is-invalid');
      this.element.querySelector('#streetTwoFeedback').textContent = 'Street Two is required.';
      return;
    }

    const isValid = /^[a-zA-Z0-9\s]{3,50}$/.test(inputValue);
    if(isValid){
      streetTwoField.classList.remove('is-invalid');
      streetTwoField.classList.add('is-valid');
      this.element.querySelector('#streetTwoFeedback').textContent = '';
    }else{
      streetTwoField.classList.remove('is-valid');
      streetTwoField.classList.add('is-invalid');
      this.element.querySelector('#streetTwoFeedback').textContent = 'Street Two is invalid.';
    }
  }
  validateMunicipalityField(event) {
    const municipalityField = event.target;
    const inputValue = municipalityField.value.trim();

    if (inputValue === '') {
      municipalityField.classList.remove('is-valid');
      municipalityField.classList.add('is-invalid');
      this.element.querySelector('#municipalityFeedback').textContent = 'Municipality is required.';
      return;
    }

    const isValid = /^[a-zA-Z0-9\s]{3,50}$/.test(inputValue);
    if(isValid){
      municipalityField.classList.remove('is-invalid');
      municipalityField.classList.add('is-valid');
      this.element.querySelector('#municipalityFeedback').textContent = '';
    }else{
      municipalityField.classList.remove('is-valid');
      municipalityField.classList.add('is-invalid');
      this.element.querySelector('#municipalityFeedback').textContent = 'Municipality is invalid.';
    }
  }

  validateCityField(event){
    const cityField = event.target;
    const inputValue = cityField.value.trim();

    if (inputValue === '') {
      cityField.classList.remove('is-valid');
      cityField.classList.add('is-invalid');
      this.element.querySelector('#cityFeedback').textContent = 'City is required.';
      return;
    }

    const isValid = /^[a-zA-Z0-9\s]{3,50}$/.test(inputValue);
    if(isValid){
      cityField.classList.remove('is-invalid');
      cityField.classList.add('is-valid');
      this.element.querySelector('#cityFeedback').textContent = '';
    }else{
      cityField.classList.remove('is-valid');
      cityField.classList.add('is-invalid');
      this.element.querySelector('#cityFeedback').textContent = 'City is invalid.';
    }
  }

  validateZipCodeField(event) {
    const zipCodeField = event.target;
    const inputValue = zipCodeField.value.trim();

    if (inputValue === '') {
      zipCodeField.classList.remove('is-valid');
      zipCodeField.classList.add('is-invalid');
      this.element.querySelector('#zipCodeFeedback').textContent = 'Zip code is required.';
      return;
    }

    const isValidZipCode = /^\d{5}(?:[-\s]\d{4})?$/.test(inputValue);

    if (isValidZipCode) {
      zipCodeField.classList.remove('is-invalid');
      zipCodeField.classList.add('is-valid');
      this.element.querySelector('#zipCodeFeedback').textContent = '';
    }else{
      zipCodeField.classList.remove('is-valid');
      zipCodeField.classList.add('is-invalid');
      this.element.querySelector('#zipCodeFeedback').textContent = 'Zip Code is invalid.';
    }
  }

  validateNameField(event) {
    const nameField = event.target;
    const inputValue = nameField.value.trim();

    if (inputValue === '') {
      nameField.classList.remove('is-valid');
      nameField.classList.add('is-invalid');
      this.element.querySelector('#nameFeedback').textContent = 'Name is required';
      return;
    }

    const isValid = /^[a-zA-Z\s]{3,50}$/.test(inputValue);

    if (isValid) {
      nameField.classList.remove('is-invalid');
      nameField.classList.add('is-valid');
      this.element.querySelector('#nameFeedback').textContent = '';
    }else{
      nameField.classList.remove('is-valid');
      nameField.classList.add('is-invalid');
      this.element.querySelector('#nameFeedback').textContent = 'Name is invalid.';
    }
  }
  validateRoleField(event) {
    const roleField = event.target;
    const selectedRole = roleField.value;

    
    if (selectedRole === '') {
      roleField.classList.remove('is-valid');
      roleField.classList.add('is-invalid');
      this.element.querySelector('#roleFeedback').textContent = 'Role is required.';
    } else {
      roleField.classList.remove('is-invalid');
      roleField.classList.add('is-valid');
    }
  }

  validateBarCodeField(event) {
    const barCodeField = event.target;
    const inputValue = barCodeField.value.trim();

    if (inputValue === '') {
      barCodeField.classList.remove('is-valid');
      barCodeField.classList.add('is-invalid');
      this.element.querySelector('#barCodeFeedback').textContent = 'Barcode is required.';
      return;
    }

    const isValid = /^\d{12}$/.test(inputValue);

    if (isValid) {
      barCodeField.classList.remove('is-invalid');
      barCodeField.classList.add('is-valid');
      this.element.querySelector('#barCodeFeedback').textContent = '';
    }else{
      barCodeField.classList.remove('is-valid');
      barCodeField.classList.add('is-invalid');
      this.element.querySelector('#barCodeFeedback').textContent = 'Bar Code is invalid.';
    }
  }

  validateProductNameField(event) {
    const productNameField = event.target;
    const inputValue = productNameField.value.trim();

    if (inputValue === '') {
      productNameField.classList.remove('is-valid');
      this.element.querySelector('#productNameFeedback').textContent = 'Produt Name is required.';
      return;
    }

    const isValid = /^[a-zA-Z\s]{3,50}$/.test(inputValue);

    if (isValid) {
      productNameField.classList.remove('is-invalid');
      productNameField.classList.add('is-valid');
      this.element.querySelector('#productNameFeedback').textContent = '';
    }else{
      productNameField.classList.remove('is-valid');
      productNameField.classList.add('is-invalid');
      this.element.querySelector('#productNameFeedback').textContent = 'Product Name is invalid.';
    }
  }

  validateDescriptionField(event) {
    const descriptionField = event.target;
    const inputValue = descriptionField.value.trim();

    if (inputValue === '') {
      descriptionField.classList.remove('is-valid');
      descriptionField.classList.add('is-invalid');
      this.element.querySelector('#descriptionFeedback').textContent = "Description can't be blank.";
      return;
    }

    if(inputValue.length < 25){
      descriptionField.classList.remove('is-valid');
      descriptionField.classList.add('is-invalid');
      this.element.querySelector('#descriptionFeedback').textContent = "Description too short.";
      return;
    }
    const isValid = /[a-zA-Z0-9\s'’-]+/.test(inputValue);

    if(isValid){
      descriptionField.classList.remove('is-invalid');
      descriptionField.classList.add('is-valid');
      this.element.querySelector('#descriptionFeedback').textContent = '';
    }else{
      descriptionField.classList.remove('is-valid');
      descriptionField.classList.add('is-invalid');
      this.element.querySelector('#descriptionFeedback').textContent = 'Description is invalid.';
    }
  }

  validateProductImageField(event) {
    const productImageField = event.target;
    const productImageFile = productImageField.files[0];

    if(!productImageFile){
      productImageField.classList.remove('is-valid');
      productImageField.classList.add('is-invalid');
      this.element.querySelector('#productImageFeedback').textContent = 'Product Image is required.';
      return;
    }

    const acceptedTypes = ['image/jpeg', 'image/png'];

    if(!acceptedTypes.includes(productImageFile.type)){
      productImageField.classList.remove('is-valid');
      productImageField.classList.add('is-invalid');
      this.element.querySelector('#productImageFeedback').textContent = 'Product Image must be JPEG or PNG.';
      return;
    }

    const maxSize = 2 * 1024 * 1024;
    if(productImageFile.size > maxSize){
      productImageField.classList.remove('is-valid');
      productImageField.classList.add('is-invalid');
      this.element.querySelector('#productImageFeedback').textContent = 'Product Image must be less than 2MB.';
      return;
    }

    productImageField.classList.remove('is-invalid');
    productImageField.classList.add('is-valid');
    this.element.querySelector('#productImageFeedback').textContent = '';
  }

  validateProductUnitField(event) {
    const productUnitField = event.target;
    const selectedUnit = productUnitField.value;

    if(selectedUnit == ''){
      productUnitField.classList.remove('is-valid');
      productUnitField.classList.add('is-invalid');
      this.element.querySelector('#productUnitFeedback').textContent = 'Product Unit is required.';
    }else{
      productUnitField.classList.remove('is-invalid');
      productUnitField.classList.add('is-valid');
    }
  }

  validateProductQuantityField(event) {
    const productQuantityField = event.target;
    const inputValue = productQuantityField.value.trim();

    if(inputValue === ''){
      productQuantityField.classList.add('is-invalid');
      this.element.querySelector('#productQuantityFeedback').textContent = "Quantity can't be blank.";
      return;
    }
    const isValid = /^\d+$/.test(inputValue);

    if(isValid){
      productQuantityField.classList.remove('is-invalid');
      productQuantityField.classList.add('is-valid');
      this.element.querySelector('#productQuantityFeedback').textContent = '';
    }else{
      productQuantityField.classList.remove('is-valid');
      productQuantityField.classList.add('is-invalid');
      this.element.querySelector('#productQuantityFeedback').textContent = "Quantity can't be blank.";
    }
  }

  validateProductUnitPriceField(event) {
    const productUnitPriceField = event.target;
    const inputValue = productUnitPriceField.value.trim();

    if(inputValue === ''){
      productUnitPriceField.classList.add('is-invalid');
      this.element.querySelector('#productUnitPriceFeedback').textContent = "Unit Price can't be blank.";
      return;
    }
    const isValid = /^\d+(\.\d{2})?$/.test(inputValue);

    if(isValid){
      productUnitPriceField.classList.remove('is-invalid');
      productUnitPriceField.classList.add('is-valid');
      this.element.querySelector('#productUnitPriceFeedback').textContent = '';
    }else{
      productUnitPriceField.classList.remove('is-valid');
      productUnitPriceField.classList.add('is-invalid');
      this.element.querySelector('#productUnitPriceFeedback').textContent = "Unit Price is invalid.";
    }
  }

  validateDeliveredDateField(event) {
    const deliveredDateField = event.target;
    const deliveredDateValue = deliveredDateField.value.trim();

    if(deliveredDateValue){
      deliveredDateField.classList.remove('is-invalid');
      deliveredDateField.classList.add('is-valid');
      this.element.querySelector('#deliveredDateFeedback').textContent = '';
    }else{
      deliveredDateField.classList.remove('is-valid');
      deliveredDateField.classList.add('is-invalid');
      this.element.querySelector('#deliveredDateFeedback').textContent = "Delivered Date is required.";
    }
  }

  validateSupplierField(event) {
    const supplierField = event.target;
    const selectedSupplier = supplierField.value;

    if(selectedSupplier === ''){
      supplierField.classList.remove('is-valid');
      supplierField.classList.add('is-invalid');
      this.element.querySelector('#supplierFeedback').textContent = 'Supplier is required.';
    }else{
      supplierField.classList.remove('is-invalid');
      supplierField.classList.add('is-valid');
    }
  }
  validateCompanyNameField(event) {
    const companyNameField = event.target;
    const companyNameValue = companyNameField.value.trim();

    if(companyNameValue === ''){
      companyNameField.classList.remove('is-valid');
      companyNameField.classList.add('is-invalid');
      this.element.querySelector('#companyNameFeedback').textContent = 'Company Name is required.';
      return;
    }

    const isValid = /^[a-zA-Z\s]{3,50}$/.test(companyNameValue);

    if(isValid){
      companyNameField.classList.remove('is-invalid');
      companyNameField.classList.add('is-valid');
      this.element.querySelector('#companyNameFeedback').textContent = '';
    }else{
      companyNameField.classList.remove('is-valid');
      companyNameField.classList.add('is-invalid');
      this.element.querySelector('#companyNameFeedback').textContent = 'Company Name is invalid.';
    }
  }

  validateCompanyAbbreviationField(event) {
    const companyAbbreviationField = event.target;
    const companyAbbreviationValue = companyAbbreviationField.value.trim();

    if(companyAbbreviationValue === ''){
      companyAbbreviationField.classList.remove('is-valid');
      companyAbbreviationField.classList.add('is-invalid');
      this.element.querySelector('#companyAbbreviationFeedback').textContent = 'Company Abbreviation is required.';
      return;
    }

    const isValid = /[A-Z]{3,}$/.test(companyAbbreviationValue);

    if(isValid){
      companyAbbreviationField.classList.remove('is-invalid');
      companyAbbreviationField.classList.add('is-valid');
      this.element.querySelector('#companyAbbreviationFeedback').textContent = '';
    }else{
      companyAbbreviationField.classList.remove('is-valid');
      companyAbbreviationField.classList.add('is-invalid');
      this.element.querySelector('#companyAbbreviationFeedback').textContent = 'Company Abbreviation is invalid.';
    }
  }
  checkAllFieldsValidity() {
    const createOrUpdateButton = this.element.querySelector('#createOrUpdateButton');
    const isValid = Array.from(this.element.querySelectorAll('.form-control,form-select')).every(field => field.classList.contains('is-valid'));

    if (isValid) {
      createOrUpdateButton.classList.remove('disabled');
    } else {
      createOrUpdateButton.classList.add('disabled');
    }
  }
  clearFields() {
    const fields = this.element.querySelectorAll('.form-control,.form-select');
    fields.forEach(field => {
      field.value = ''; 
      field.classList.remove('is-valid', 'is-invalid'); 
    });

    const feedbacks = this.element.querySelectorAll('.invalid-feedback');
    feedbacks.forEach(feedback => {
      feedback.textContent = '';
    });

    this.checkAllFieldsValidity();
  }

  resetFields(){
    const fields = this.element.querySelectorAll('.form-control,.form-select');
    fields.forEach(field => {
      if(field.classList.contains('is-invalid')){
        field.classList.remove('is-invalid');
        field.classList.add('is-valid'); 
      }
    });

    const feedbacks = this.element.querySelectorAll('.invalid-feedback');
    feedbacks.forEach(feedback => {
      feedback.textContent = '';
    });

    this.checkAllFieldsValidity();
  }
}
