import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="pos"
export default class extends Controller {
  static targets = ["currentTime","displayCustomerInfo","customerSelect","selectedCustomer","orderItemsTable","totalDisplay"];
  connect() {
    this.updateTime(); 
    const customerSelect = this.element.querySelector('#customer_id');
    customerSelect.addEventListener('change', () => {
      this.updateCustomerName();
      this.hideAddCustomerButton();
    });
    
   
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

  addProductAsOrderItem(event) {
    const productId = event.currentTarget.dataset.productId;
    const productName = event.currentTarget.dataset.productName;
    const productQuantity = event.currentTarget.dataset.productQuantity;
    const productPrice = parseFloat(event.currentTarget.dataset.productPrice);
    
    // Create table row with editable quantity input field
    const newRow = document.createElement('tr');
    newRow.setAttribute('id', `orderItemRow[${productId}]`);
    newRow.innerHTML = `
      <td>${productName}</td>
      <input type="hidden" name="order_items[${productId}][product_id]" value="${productId}">
      <td><input type="number" class="form-control form-control-sm text-dark is-valid" style="width: 50%;" value="1" min="1" id="orderItemQuantity[${productId}]" data-product-id="${productId}" data-product-price="${productPrice}" data-product-quantity="${productQuantity}" data-action="input->pos#updateTotalPrice input->pos#validateQuantityField"></td>
      <input type="hidden" name="order_items[${productId}][quantity]" value="" id="order_items[${productId}][quantity]">
      <td id ="orderItemTotalPrice[${productId}]">₱${productPrice.toFixed(2)}</td>
      <input type="hidden" name="order_items[${productId}][total_price]" value="" id="order_items[${productId}][total_price]">
      <td>
      <button class="btn btn-danger btn-sm" id="removeOrderItemBtn[${productId}]" data-action="click->pos#removeOrderItem" data-product-id="${productId}">Remove</button>
      </td>
    `;

    // Append new row to the table
    const tableBody = document.getElementById('orderItemsTableBody');
    tableBody.appendChild(newRow);

    const quantity = 1;
    const totalPrice = quantity * productPrice;
    const quantityField = document.getElementById(`order_items[${productId}][quantity]`);
    quantityField.value = quantity;

    const totalPriceField = document.getElementById(`order_items[${productId}][total_price]`);
    totalPriceField.value = totalPrice.toFixed(2);

    // Disable the product card
    const productCard = document.getElementById(`product[${productId}]`);
    productCard.classList.add('disabled');
    this.hideDisplayReminder();
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

    const quantityField = document.getElementById(`order_items[${productId}][quantity]`);
    quantityField.value = quantity;

    const totalPriceField = document.getElementById(`order_items[${productId}][total_price]`);
    totalPriceField.value = totalPrice.toFixed(2);

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

    const totalAmountField = document.getElementById('total');
    totalAmountField.value = totalAmount.toFixed(2);

    const discountInputField = document.getElementById('discountField');
    const discountField = document.getElementById('discount');
    discountField.value = discountInputField.value;

    const grandTotalAmountField = document.getElementById('grand_total');
    const discount = discountField.value;
    const total = totalAmountField.value;
    
    if(discount > 0){
      let discountValue = 0;
      discountValue = total * (discount/100);   
      grandTotalAmountField.value = total - discountValue;
      grandTotalAmountSpan.textContent = `₱${grandTotalAmountField.value}`;
    }else{
      grandTotalAmountField.value = total;
      grandTotalAmountSpan.textContent = `₱${grandTotalAmountField.value}`;
    }
    this.totalDisplayTarget.textContent = `₱${grandTotalAmountField.value}`;

  }
  
  removeOrderItem(event){
    const productId = event.currentTarget.dataset.productId;
    const rowToRemove = document.getElementById(`orderItemRow[${productId}]`);

    if(rowToRemove){
      rowToRemove.remove();

      const table = document.getElementById('orderItemsTableBody');
      const productReminder = document.getElementById('selectProductReminder');
      const selectElement = document.getElementById('customer_id');
      const reminderPlaceholder = document.getElementById('reminderPlaceholder');
      const proceedPaymentBtn = document.getElementById('proceedPaymentBtn');
      const customerReminder = document.getElementById('selectCustomerReminder');
      const productCard = document.getElementById(`product[${productId}]`);
      if(table.children.length == 0 && (selectElement.selectedIndex >= 0)){
        reminderPlaceholder.classList.remove('d-none');
        productReminder.classList.remove('d-none');
        proceedPaymentBtn.classList.add('disabled');
        customerReminder.classList.add('d-none');  
      }
      productCard.classList.remove('disabled');
      this.updateTotalAmounts();
    }
  }
  hideDisplayReminder(){
    const reminderPlaceholder = document.getElementById('reminderPlaceholder');
    const proceedPaymentBtn = document.getElementById('proceedPaymentBtn');
    const productReminder = document.getElementById('selectProductReminder');
    const customerReminder = document.getElementById('selectCustomerReminder');
    const table = document.getElementById('orderItemsTableBody');
    const selectElement = document.getElementById('customer_id');
    const discountTotalDiv = this.element.querySelector('#discountTotalDiv');
    const discountInput = this.element.querySelector('#discountField');

    if((table.children.length >=1) && (selectElement.selectedIndex > 0)){
      reminderPlaceholder.classList.add('d-none');
      productReminder.classList.add('d-none');
      customerReminder.classList.add('d-none');
      proceedPaymentBtn.classList.remove('disabled');
      discountInput.classList.remove('d-none');
      discountTotalDiv.classList.remove('text-end');
      discountTotalDiv.classList.add('d-flex');
      discountTotalDiv.classList.add('justify-content-between');
    }else if(selectElement.selectedIndex > 0){
      customerReminder.classList.add('d-none');
    }else{
      productReminder.classList.add('d-none');
    }
  }

  checkoutOrder() {
    const grandTotalAmountField = document.getElementById('grand_total');
    const paymentInputField = document.getElementById('amountField');
    const paymentField = document.getElementById('amount');
    const checkoutOrderBtn = document.getElementById('checkOutOrderBtn');
    const paymentReminder = document.getElementById('paymentReminderPlaceholder')
    const changeField = this.element.querySelector('#change');

    paymentField.value = paymentInputField.value;
    const payment = parseFloat(paymentField.value);
    const grandTotal = parseFloat(grandTotalAmountField.value);
    if (payment >= grandTotal) {
      changeField.value = payment - grandTotal;
      checkoutOrderBtn.classList.remove('d-none');
      paymentReminder.classList.add('d-none');
      paymentInputField.classList.remove('is-invalid')
      paymentInputField.classList.add('is-valid')
    } else {
      paymentReminder.classList.remove('d-none');
      checkoutOrderBtn.classList.add('d-none');
      paymentInputField.classList.remove('is-valid')
      paymentInputField.classList.add('is-invalid')
    }
  }
  disableField(){
    this.customerSelectTarget.disabled = true;
  }
  
  removeReminder(){
    const createCustomerReminder = this.element.querySelector('#createCustomerReminder');
    createCustomerReminder.classList.add('d-none');
  }
  hideAddCustomerButton(){
    const addCustomerButton = this.element.querySelector('#addCustomerButton');
    addCustomerButton.classList.add('d-none');
  }
  enableField(){
    this.customerSelectTarget.disabled = false;
  }
  
  validateDiscountField(event) {
    const discountField = event.target;
    const discountValue = discountField.value.trim();
    const proceedPaymentBtn = document.getElementById('proceedPaymentBtn');
    if(discountValue === ''){
      discountField.classList.remove('is-invalid','is-valid');
      this.element.querySelector('#discountFeedback').textContent = "";
      proceedPaymentBtn.classList.remove('disabled');
      return;
    }
    const isValid = /^\d{1,2}$/.test(discountValue);

    if(isValid){
      discountField.classList.remove('is-invalid');
      discountField.classList.add('is-valid');
      proceedPaymentBtn.classList.remove('disabled');
      this.element.querySelector('#discountFeedback').textContent = '';
    }else{
      discountField.classList.remove('is-valid');
      discountField.classList.add('is-invalid');
      proceedPaymentBtn.classList.add('disabled');
      this.element.querySelector('#discountFeedback').textContent = 'Discount is invalid.';
    }
  }

  validateQuantityField(event) {
    const input = event.target;
    const productId = input.dataset.productId;
    const productQuantity = parseInt(input.dataset.productQuantity, 10); 
    const inputValue = parseInt(input.value, 10);
    const quantityReminder = this.element.querySelector('#selectProductQuantityReminder');
    const proceedPaymentBtn = document.getElementById('proceedPaymentBtn');
    const reminderPlaceholder = document.getElementById('reminderPlaceholder');
    if(isNaN(inputValue)){
      input.classList.remove('is-invalid','is-valid');
      proceedPaymentBtn.classList.add('disabled');
      quantityReminder.classList.remove('d-none');
      quantityReminder.textContent = '- Quantity should be at least 1.'
      reminderPlaceholder.classList.remove('d-none');
      return;
    }
    if(inputValue > productQuantity){
      input.classList.add('is-invalid');
      proceedPaymentBtn.classList.add('disabled');
      quantityReminder.classList.remove('d-none');
      reminderPlaceholder.classList.remove('d-none');
    }else{
      input.classList.remove('is-invalid');
      input.classList.add('is-valid');
      quantityReminder.classList.add('d-none');
      reminderPlaceholder.classList.add('d-none');
      proceedPaymentBtn.classList.remove('disabled');
    }
  }


}
