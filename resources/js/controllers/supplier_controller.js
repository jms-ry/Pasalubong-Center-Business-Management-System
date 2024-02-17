import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="supplier"
export default class extends Controller {
    static targets =['companyName','companyAbbreviation','emailAddress','streetOne','streetTwo','municipality','city','zipCode','supplierId','supplierName','supplierAbbreviation','supplierEmail','supplierStreetOne','supplierStreetTwo','supplierMunicipality','supplierCity','supplierZipCode'];
    connect() {
    }

    viewSupplierModal(event) {
        const supplierData = event.currentTarget.dataset.supplier;
        const supplierId = event.currentTarget.dataset.supplierId;

        if(supplierData){
            const supplier = JSON.parse(supplierData);
            const deleteForm = this.element.querySelector('#deleteSupplierForm');
            deleteForm.action = deleteForm.action.replace('__SUPPLIER_ID__', supplierId);

            this.companyNameTarget.textContent = supplier.company_name || '';
            this.companyAbbreviationTarget.textContent = supplier.company_abbreviation || '';
            this.emailAddressTarget.textContent = supplier.email_address || '';

            if (supplier.address) {
                const address = supplier.address;

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

    editSupplierModal(event) {
        const supplierData = event.currentTarget.dataset.supplier;
        const supplierId = event.currentTarget.dataset.supplierId;

        if(supplierData){
            const supplier = JSON.parse(supplierData);
            const editForm = this.element.querySelector('#editSupplierForm');
            editForm.action = editForm.action.replace('__SUPPLIER_ID__', supplierId);

            this.supplierNameTarget.value = supplier.company_name || '';
            this.supplierAbbreviationTarget.value = supplier.company_abbreviation || '';
            this.supplierEmailTarget.value = supplier.email_address || '';

            if(supplier.address){
                const address = supplier.address;

                this.supplierStreetOneTarget.value = address.street_one || '';
                this.supplierStreetTwoTarget.value = address.street_two || '';
                this.supplierMunicipalityTarget.value = address.municipality || '';
                this.supplierCityTarget.value = address.city || '';
                this.supplierZipCodeTarget.value = address.zip_code || '';
            }else{
                this.supplierStreetOneTarget.value = '';
                this.supplierStreetTwoTarget.value = '';
                this.supplierMunicipalityTarget.value = '';
                this.supplierCityTarget.value = '';
                this.supplierZipCodeTarget.value = '';
            }
        }
    }
}
