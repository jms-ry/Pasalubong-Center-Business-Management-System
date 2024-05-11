import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="product-filter-date"
export default class extends Controller {
  static targets = ["dateInput"];
  connect() {
  }
  filterByDate() {
    const date = this.dateInputTarget.value;
    const search = new URLSearchParams(window.location.search).get('search');
    if(search){
      window.location.href = `/products?search=${search}&date=${date}`;
      return;
    }
    window.location.href = `/products?date=${date}`;
  }
}
