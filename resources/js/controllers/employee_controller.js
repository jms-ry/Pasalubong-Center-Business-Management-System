import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="employee"
export default class extends Controller {
    
    static targets = ['Name','Role','email','streetOne','streetTwo','municipality','city','zipCode','employeeId','employeeName', 'employeeRole', 'employeeEmail', 'employeeStreetOne', 'employeeStreetTwo', 'employeeMunicipality', 'employeeCity', 'employeeZipCode'];
    connect() {
    }

    viewEmployeeModal(event) {
        const employeeData = event.currentTarget.dataset.employee;
        const employeeId = event.currentTarget.dataset.employeeId;

        if(employeeData)
        {
            const employee = JSON.parse(employeeData);
            const deleteForm = this.element.querySelector('#deleteEmployeeForm');
            deleteForm.action = deleteForm.action.replace('__EMPLOYEE_ID__', employeeId);
            
            this.NameTarget.textContent = employee.user.name || '';
            this.RoleTarget.textContent = employee.user.role || '';
            this.emailTarget.textContent = employee.user.email || '';

            if(employee.user.address){
                const address = employee.user.address;

                this.streetOneTarget.textContent = address.street_one || '';
                this.streetTwoTarget.textContent = address.street_two || '';
                this.municipalityTarget.textContent = address.municipality || '';
                this.cityTarget.textContent = address.city || '';
                this.zipCodeTarget.textContent = address.zip_code || '';
            }else{
                this.streetOneTarget.textContent = '';
                this.streetTwoTarget.textContent = '';
                this.municipalityTarget.textContent = '';
                this.cityTarget.textContent = '';
                this.zipCodeTarget.textContent = '';
            }
        }
    }

    editEmployeeModal(event) {
        const employeeData = event.currentTarget.dataset.employee;
        const employeeId = event.currentTarget.dataset.employeeId;

        if(employeeData){
            const employee = JSON.parse(employeeData);
            const editForm = this.element.querySelector('#editEmployeeForm');
            editForm.action = editForm.action.replace('__EMPLOYEE_ID__', employeeId);

            this.employeeNameTarget.value = employee.user.name || '';
            this.employeeRoleTarget.value = employee.user.role || '';
            this.employeeEmailTarget.value = employee.user.email || '';

            if(employee.user.address){
                const address = employee.user.address;

                this.employeeStreetOneTarget.value = address.street_one || '';
                this.employeeStreetTwoTarget.value = address.street_two || '';
                this.employeeMunicipalityTarget.value = address.municipality || '';
                this.employeeCityTarget.value = address.city || '';
                this.employeeZipCodeTarget.value = address.zip_code || '';
            }
            else{
                this.employeeStreetOneTarget.value = '';
                this.employeeStreetTwoTarget.value = '';
                this.employeeMunicipalityTarget.value = '';
                this.employeeCityTarget.value = '';
                this.employeeZipCodeTarget.value = '';
            }
        }
    }
}
