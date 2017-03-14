import './baseLayout.html';
import '../components/nav.js';
import '../components/sidebar.js';
import '../components/offcanvasButton.js';
import '../components/menu.js';

Template.baseLayout.events({
  "click [data-toggle='offcanvas']": function(){
    Modal.show('menu');
  }
});
