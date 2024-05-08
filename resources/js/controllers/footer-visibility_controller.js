import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="footer-visibility"
export default class extends Controller {
  connect() {
    setTimeout(() => {
      this.checkFooterVisibility();
    }, 100);
  }

  checkFooterVisibility() {
    const footer = this.element;
    const footerRect = footer.getBoundingClientRect();
    
    // Check if the bottom of the footer is within the viewport height
    const isFooterVisible = footerRect.bottom <= window.innerHeight;
    
    if(window.location.pathname === "/point-of-sale"){
      document.body.classList.add('overflow-x-hidden');
      document.body.classList.remove('overflow-hidden');
      return;
    }else if(window.location.pathname === "/dashboard"){
      document.body.classList.remove('overflow-x-hidden');
      document.body.classList.add('overflow-hidden');
      return;
    }else if(isFooterVisible){
      document.body.classList.remove('overflow-x-hidden');
      document.body.classList.add('overflow-hidden');
      return;
    }else{
      document.body.classList.remove('overflow-hidden');
      document.body.classList.add('overflow-x-hidden');
      return; 
    }
  }
}
