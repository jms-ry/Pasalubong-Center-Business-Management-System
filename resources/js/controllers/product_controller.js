import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="product"
export default class extends Controller {
  static targets =[
    'barCode',
    'name',
    'description',
    'unit',
    'unitPrice',
    'quantity',
    'deliveredDate',
    'supplierName',
    'productBarCode',
    'productName',
    'productDescription',
    'productUnit',
    'productUnitPrice',
    'productQuantity',
    'productDeliveredDate',
    'productSupplierName',
    'searchField',
    'sortField',

  ];
  connect() {
  }

  formatDeliveryDate(dateString) {
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    const formattedDate = new Date(dateString).toLocaleDateString(undefined, options);
    return formattedDate;
  }
  formatUnitPrice(unitPrice) {
    return `₱ ${unitPrice}`;
  }

  capitalizeFirstLetter(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }
  viewProductModal(event) {
    const productData = event.currentTarget.dataset.product;
    const productId = event.currentTarget.dataset.productId;

    if (productData) {
      const product = JSON.parse(productData);
      const deleteForm = this.element.querySelector('#deleteProductForm');
      deleteForm.action = deleteForm.action.replace('__PRODUCT_ID__', productId);

      this.barCodeTarget.textContent = product.bar_code || '';
      this.nameTarget.textContent = product.name || '';
      this.descriptionTarget.textContent = product.description || '';
    
      if (product.unit) {
        this.unitTarget.textContent = this.capitalizeFirstLetter(product.unit);
      } else {
        this.unitTarget.textContent = '';
      }

      if (product.unit_price) {
        this.unitPriceTarget.textContent = this.formatUnitPrice(product.unit_price);
      } else {
        this.unitPriceTarget.textContent = '';
      }

      this.quantityTarget.textContent = product.quantity || '';

      if (product.delivered_date) {
        this.deliveredDateTarget.textContent = this.formatDeliveryDate(product.delivered_date);
      } else {
        this.deliveredDateTarget.textContent = '';
      }

      if (product.supplier) {
        this.supplierNameTarget.textContent = product.supplier.company_name || '';
      } else {
        this.supplierNameTarget.textContent = '';
      }
    }
  }

  editProductModal(event) {
    const productData = event.currentTarget.dataset.product;
    const productId = event.currentTarget.dataset.productId;

    if (productData) {
      const product = JSON.parse(productData);
      const editForm = this.element.querySelector('#editProductForm');
      editForm.action = editForm.action.replace('__PRODUCT_ID__', productId);

      this.productBarCodeTarget.value = product.bar_code || '';
      this.productNameTarget.value = product.name || '';
      this.productDescriptionTarget.value = product.description || '';
      this.productUnitTarget.value = product.unit || '';
      this.productUnitPriceTarget.value = product.unit_price || '';
      this.productQuantityTarget.value = product.quantity || '';
      this.productDeliveredDateTarget.value = product.delivered_date || '';

      this.productSupplierNameTarget.value = product.supplier_id || 'selected';

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
