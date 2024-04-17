import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="user"
export default class extends Controller {
  static targets = [
    'Name',
    'Role',
    'Email',
    'StreetOne',
    'StreetTwo',
    'Municipality',
    'City',
    'ZipCode',
    'userName',
    'userRole',
    'userEmail',
    'userStreetOne',
    'userStreetTwo',
    'userMunicipality',
    'userCity',
    'userZipCode',
    'searchField','sortField'  
  ];
  connect() {
    
  }

  viewAccountModal(event){
    const userData = event.currentTarget.dataset.user;
    const userId = event.currentTarget.dataset.userId;
        
    if(userData){
      const user = JSON.parse(userData);
      const deleteForm = this.element.querySelector('#deleteUserForm');
      deleteForm.action = deleteForm.action.replace('__USER_ID__', userId);

      this.NameTarget.textContent = user.name || '';
      this.RoleTarget.textContent = user.role || '';
      this.EmailTarget.textContent = user.email || '';

      if(user.address){
        const address = user.address;

        this.StreetOneTarget.textContent = address.street_one || '';
        this.StreetTwoTarget.textContent = address.street_two || '';
        this.MunicipalityTarget.textContent = address.municipality || '';
        this.CityTarget.textContent = address.city || '';
        this.ZipCodeTarget.textContent = address.zip_code || '';
      }else{
        this.StreetOneTarget.textContent = '';
        this.StreetTwoTarget.textContent = '';
        this.MunicipalityTarget.textContent = '';
        this.CityTarget.textContent = '';
        this.ZipCodeTarget.textContent = '';
      }
    }
  }
  editAccountModal(event){
    const userData = event.currentTarget.dataset.user;
    const userId = event.currentTarget.dataset.userId;

    if (userData){
      const user = JSON.parse(userData);
      const editForm = this.element.querySelector('#editUserForm');
      editForm.action = editForm.action.replace('__USER_ID__', userId);

      this.userNameTarget.value = user.name || '';
      this.userRoleTarget.value = user.role || '';
      this.userEmailTarget.value = user.email || '';

      if(user.address){
        const address = user.address;

        this.userStreetOneTarget.value = address.street_one || '';
        this.userStreetTwoTarget.value = address.street_two || '';
        this.userMunicipalityTarget.value = address.municipality || '';
        this.userCityTarget.value = address.city || '';
        this.userZipCodeTarget.value = address.zip_code || '';
      }else{
        this.userStreetOneTarget.value = '';
        this.userStreetTwoTarget.value = '';
        this.userMunicipalityTarget.value = '';
        this.userCityTarget.value = '';
        this.userZipCodeTarget.value = '';
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
