import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="pos"
export default class extends Controller {
  static targets = ["currentTime","customerNameSpan","customerSelect","selectedCustomer","quantity", "totalCost", "productSelect","displayCustomerInfo"];
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
    this.customerNameSpanTarget.textContent = selectedCustomerOption ? selectedCustomerOption.text : '';
    this.selectedCustomerTarget.textContent = selectedCustomerOption ? selectedCustomerOption.text : '';
    
    const customerName = selectedCustomerOption ? selectedCustomerOption.text : '';
    const additionalInfo = "Orders Information"; 
    this.displayCustomerInfoTarget.textContent = `${customerName}'s ${additionalInfo}`;
    if(selectedCustomerOption){
      this.customerNameSpanTarget.classList.remove('text-muted');
      this.customerNameSpanTarget.classList.add('text-white');
    }
  }

  clearCustomerField(){
    this.customerNameSpanTarget.textContent = "Customer's Name";
    this.customerNameSpanTarget.classList.remove('text-white');
    this.customerNameSpanTarget.classList.add('text-muted');
    this.selectedCustomerTarget.textContent = "";
    this.customerSelectTarget.value = "";
    this.displayCustomerInfoTarget.textContent = "Customer's Order Information";
    this.totalCostTarget.value = "";
    this.quantityTarget.value = "";
    this.productSelectTarget.value = "";
  }

  updateTotalCost() {
    const selectedProduct = this.productSelectTarget.options[this.productSelectTarget.selectedIndex];
    const unitPrice = parseFloat(selectedProduct.getAttribute("data-unit-price"));
    const quantity = parseInt(this.quantityTarget.value);
    console.log('unitPrice type:', typeof unitPrice); 
    if (!isNaN(unitPrice) && !isNaN(quantity)) {
        const totalCost = unitPrice * quantity;
        // Set the value to totalCostTarget
        this.totalCostTarget.value = totalCost.toFixed(2);
    }
}
}
