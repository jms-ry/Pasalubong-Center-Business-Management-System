import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="pos"
export default class extends Controller {
  static targets = ["currentTime","displayCustomerInfo","customerSelect","selectedCustomer","orderItemsTable"];
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

  addProductToOrder(event) {
    const productId = event.currentTarget.dataset.productId;
    const productName = event.currentTarget.dataset.productName;
    const productPrice = parseFloat(event.currentTarget.dataset.productPrice);

    // Create table row with editable quantity input field
    const newRow = document.createElement('tr');
    newRow.setAttribute('id', `orderItemRow[${productId}]`);
    newRow.innerHTML = `
      <td>${productName}</td>
      <td><input type="number" class="form-control form-control-sm text-dark" style="width: 50%;" value="1" min="1" id="orderItemQuantity[${productId}]" data-product-id="${productId}" data-product-price="${productPrice}" data-action="input->pos#updateTotalPrice "></td>
      <td id ="orderItemTotalPrice[${productId}]">₱${productPrice.toFixed(2)}</td>
      <td>
      <button class="btn btn-danger btn-sm" id="removeOrderItemBtn[${productId}]" data-action="click->pos#removeOrderItem" data-product-id="${productId}">Remove</button>
      </td>
    `;

    // Append new row to the table
    const tableBody = document.getElementById('orderItemsTableBody');
    tableBody.appendChild(newRow);

    
    // Enable proceed to payment button
    const proceedPaymentBtn = document.getElementById('proceedPaymentBtn');
    proceedPaymentBtn.classList.remove('disabled');

    this.updateTotalAmounts();

  }
  updateTotalPrice(event) {
    const input = event.target;
    const quantity = input.value.trim() === '' ? 0 : parseInt(input.value);
    const productId = input.dataset.productId;
    const productPrice = parseFloat(input.dataset.productPrice);
    const totalPrice = quantity * productPrice;
    const totalPriceCell = document.getElementById(`orderItemTotalPrice[${productId}]`);
    totalPriceCell.textContent = `₱${totalPrice.toFixed(2)}`;

    this.updateTotalAmounts();
  }
  updateTotalAmounts() {
    let totalAmount = 0;
  
    // Iterate over each row in the order table
    const rows = this.orderItemsTableTarget.querySelectorAll('tr');
    rows.forEach(row => {
      const totalPriceCell = row.querySelector('td[id^="orderItemTotalPrice"]');
      if (totalPriceCell) {
        const totalPrice = parseFloat(totalPriceCell.textContent.replace('₱', ''));
        totalAmount += totalPrice;
      }
    });
  
    // Update total amount and grand total
    const totalAmountSpan = document.getElementById('totalAmountValue');
    totalAmountSpan.textContent = `₱${totalAmount.toFixed(2)}`;
  
    const grandTotalAmountSpan = document.getElementById('grandTotalAmountValue');
    grandTotalAmountSpan.textContent = `₱${totalAmount.toFixed(2)}`;
  }
  
  removeOrderItem(event){
    const productId = event.currentTarget.dataset.productId;
    const rowToRemove = document.getElementById(`orderItemRow[${productId}]`);

    if(rowToRemove){
      rowToRemove.remove();

      this.updateTotalAmounts();
    }
  }
}
