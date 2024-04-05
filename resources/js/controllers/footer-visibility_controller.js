import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="footer-visibility"
export default class extends Controller {
  connect() {
    this.checkFooterVisibility();
  }

  checkFooterVisibility() {
    const footer = this.element;
    const footerRect = footer.getBoundingClientRect();
    
    // Check if the bottom of the footer is within the viewport height
    const isFooterVisible = footerRect.bottom <= window.innerHeight;
    
    if(isFooterVisible){
      document.body.classList.add('overflow-hidden');
    }else{
      if(window.location.pathname === "/dashboard"){
        document.body.classList.add('overflow-hidden');
      }
      document.body.classList.add('overflow-x-hidden'); 
    }
  }
}
