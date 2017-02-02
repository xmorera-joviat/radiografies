// creat per Raül López
import { _ } from 'meteor/underscore';

Template.test.onCreated(function(){
  this.autorun(()=>{
    Meteor.subscribe('test');
  });
});
Template.test.helpers({
  Posicions: function() {
    return Test.find();
  },
  tableSettings: {
    rowsPerPage: 5,
    fields: [
      {
        key: 'zona',
        label: 'Zona'
      },
      {
        key: 'os',
        label: 'Os'
      },
      {
        key: 'posicio',
        label: 'Posicio'
      },
      {
        key: 'centratge',
        label: 'Centratge'
      }
    ],
    showFilter: true,
    items: function() {
      return Test.find();
    }

  }
});
Template.test.events({
    'click tr': function() {
      Session.set('accio','editar');
      Session.set('event', this);
      var event = this;
      Modal.show('testModal');
      //var event = Session.get('event');
      $('input[name="modalId"]').val(event._id);
      $('input[name="modalZona"]').val(event.zona);
      $('input[name="modalOs"]').val(event.os);
      $('input[name="modalPosicio"]').val(event.posicio);
      $('input[name="modalCentratge"]').val(event.centratge);
    },
    'click .crear': function() {
      Session.set('accio': 'crear');
      Modal.show('testModal')
    }
});
