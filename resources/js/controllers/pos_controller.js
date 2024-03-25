import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="pos"
export default class extends Controller {
  static targets = ["currentTime","displayCustomerInfo","customerSelect","selectedCustomer"];
  connect() {
    this.updateTime(); 
    const customerSelect = this.element.querySelector('#customer_id');
    customerSelect.addEventListener('change', () => this.updateCustomerName());
  }

  updateTime() {
    setInterval(() => {
      const currentTime = new Date();
      const hours = currentTime.getHours() % 12 || 12; 
      const minutes = currentTime.getMinutes();
      const seconds = currentTime.getSeconds();
      const formattedMinutes = minutes < 10 ? "0" + minutes : minutes;
      const formattedSeconds = seconds < 10 ? "0" + seconds : seconds;
      const meridiem = currentTime.getHours() >= 12 ? 'PM' : 'AM';
      
      const timeString = `${hours}:${formattedMinutes}:${formattedSeconds} ${meridiem}`;

      this.currentTimeTarget.textContent = timeString;
    }, 1000); 
  }
  updateCustomerName() {
    const selectedCustomerOption = this.element.querySelector('#customer_id option:checked');
    this.selectedCustomerTarget.textContent = selectedCustomerOption ? selectedCustomerOption.text : '';

    const customerName = selectedCustomerOption ? selectedCustomerOption.text : '';
    const additionalInfo = "Orders Information"; 
    this.displayCustomerInfoTarget.textContent = `${customerName}'s ${additionalInfo}`;
    this.selectedCustomerTarget.classList.add('d-none');
  }
}
