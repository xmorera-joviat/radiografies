import './mainLayout.html';
import '../components/side.html';
import '../components/navigation.html';
import {Meteor} from 'meteor/meteor';
// import '../../../client/assets/js/metisMenu.js';
// import '../../../client/assets/js/sb-admin-2.js';

Template.mainLayout.onRendered(function(){
  $(function() {
      $('#side-menu').metisMenu();
  });

  $(function() {
      $(window).bind("load resize", function() {
          var topOffset = 50;
          var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
          if (width < 768) {
              $('div.navbar-collapse').addClass('collapse');
              topOffset = 100;
          } else {
              $('div.navbar-collapse').removeClass('collapse');
          }

          var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
          height = height - topOffset;
          if (height < 1) height = 1;
          if (height > topOffset) {
              $("#page-wrapper").css("min-height", (height) + "px");
          }
      });

      var url = window.location;
      var element = $('ul.nav a').filter(function() {
          return this.href == url;
      }).addClass('active').parent();

      while (true) {
          if (element.is('li')) {
              element = element.parent().addClass('in').parent();
          } else {
              break;
          }
      }
  });
})

Template.mainLayout.helpers({

  'click .logout': function(event){
    //event.preventDefault();
    Meteor.logout()
    AccountsTemplates.logout();
  }
});
