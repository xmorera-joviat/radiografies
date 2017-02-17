import {Meteor} from 'meteor/meteor';
import './nav.html';

Template.nav.events({

'click #btn-menuOpen':function(){
var  mySidenav = document.getElementById("mySidenav");
var  overlayBg = document.getElementById("myOverlay");

  if (mySidenav.style.display === 'block') {
      mySidenav.style.display = 'none';
      overlayBg.style.display = "none";
  } else {
      mySidenav.style.display = 'block';
      overlayBg.style.display = "block";
  }
},
'click #myOverlay':function(){

  var  mySidenav = document.getElementById("mySidenav");
  var  overlayBg = document.getElementById("myOverlay");
  mySidenav.style.display = "none";
  overlayBg.style.display = "none";
}

});
