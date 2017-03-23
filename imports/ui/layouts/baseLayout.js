import './baseLayout.html';
import '../components/menu.js';
import '../components/nav.js';

Template.baseLayout.events({
  "click [data-toggle='offcanvas']": function(){
    Modal.show('menu');
  }
});
