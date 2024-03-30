import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="product-sales"
export default class extends Controller {
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
}
