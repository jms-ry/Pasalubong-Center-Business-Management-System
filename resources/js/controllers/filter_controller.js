import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="filter"
export default class extends Controller {
  static targets = ["dateInput"];
  connect() {
  }
  filterByDate() {
    const date = this.dateInputTarget.value;
    const search = new URLSearchParams(window.location.search).get('search');
    if(search){
      window.location.href = `/sales?search=${search}&date=${date}`;
      return;
    }
    window.location.href = `/sales?date=${date}`;
  }
}
