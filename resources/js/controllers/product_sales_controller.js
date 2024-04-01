import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="product-sales"
export default class extends Controller {
  
  static targets = ["customerName","orderNumberId","orderDate","orderTime","userName","total"];
  connect() {
    this.updateTotal();
  }

  updateTotal(){
    const receiptTotalCells = this.element.querySelectorAll('[id^="receiptTotal"]');
    let totalSales = 0;

    receiptTotalCells.forEach(cell => {
      const amount = parseFloat(cell.textContent.replace(/[^\d.]/g, ''));
      totalSales += amount;
    });

    const totalSalesCell = document.getElementById('totalSales');
    totalSalesCell.textContent = `₱${totalSales.toFixed(2)}`;
  }
  viewReceiptModal(event){
    const receiptData = event.currentTarget.dataset.receipt;

    if(receiptData){
      const receipt = JSON.parse(receiptData);
      const createdAt = new Date(receipt.payment.order.created_at);

      const options = { month: 'short', day: '2-digit', year: 'numeric' };
      const formattedDate = createdAt.toLocaleDateString('en-US', options);
      const formattedTime = createdAt.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });

      if(receipt.payment.order.customer.first_name){
       const customerName = receipt.payment.order.customer.first_name;
       const possessiveCustomerName = customerName + "'s";
       this.customerNameTarget.textContent = possessiveCustomerName;
      }
      if(receipt.payment.order){
        this.orderNumberIdTarget.textContent = receipt.payment.order.id;
        this.totalTarget.textContent = '₱' + receipt.payment.order.total;
      }
      if(receipt.payment.order.created_at){
        this.orderDateTarget.textContent = formattedDate;
        this.orderTimeTarget.textContent = formattedTime;
      }
      if(receipt.payment.order.user.name){
        this.userNameTarget.textContent = receipt.payment.order.user.name;
      }

      const viewOrderItemsTable = document.getElementById('viewOrderItemsTable');
      viewOrderItemsTable.innerHTML = '';
      if(receipt.payment.order.order_items && receipt.payment.order.order_items.length > 0){
        const orderItems = receipt.payment.order.order_items;
        
        orderItems.forEach(orderItem => {
          const newRow = document.createElement('tr');
          newRow.innerHTML = `
            <td class="fw-bold text-dark">${orderItem.product.name}</td>
            <td class="fw-bold text-dark text-center">${orderItem.quantity}</td>
            <td class="fw-bold text-dark text-center">${orderItem.total_price}</td>
          `;
          viewOrderItemsTable.appendChild(newRow);
        });
      }
    }
  }
}
