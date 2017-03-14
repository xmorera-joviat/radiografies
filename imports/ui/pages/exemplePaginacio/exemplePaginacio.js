// creat per Raül López
// Exemple per veure la sintaxi ES2015

import {Meteor} from 'meteor/meteor';
import './exemplePaginacio.html';
import './exemplePaginacioModal.js';
import {Test} from '../../../api/exemplePaginacio/exemplePaginacio.js';
import '../../../api/exemplePaginacio/methods.js';
import { _ } from 'meteor/underscore';
import {Modal} from 'meteor/peppelg:bootstrap-3-modal';
import 'meteor/aslagle:reactive-table';
import {Session} from 'meteor/session';

Template.exemplePaginacio.onCreated(function(){
  this.autorun(()=>{
    this.subscribe('test');
  });
});

Template.exemplePaginacio.helpers({

  settings: function () {
    return {
        collection: Test,
        rowsPerPage: 10,
        showFilter: true,
        fields: ['zona', 'os', 'posicio','centratge']
    };
  }

});

Template.exemplePaginacio.events({
    'click tr': function() {
      Session.set('accio','editar');
      Session.set('event', this);
      var event = this;
      Modal.show('testModal');
      $('input[name="modalId"]').val(event._id);
      $('input[name="modalZona"]').val(event.zona);
      $('input[name="modalOs"]').val(event.os);
      $('input[name="modalPosicio"]').val(event.posicio);
      $('input[name="modalCentratge"]').val(event.centratge);
    },
    'click .crear': function() {
      Session.set('accio','crear');
      Modal.show('testModal')
    }
});
