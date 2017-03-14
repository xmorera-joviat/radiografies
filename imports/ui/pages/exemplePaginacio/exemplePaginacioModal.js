// creat per Raül López
// Exemple per veure la sintaxi ES2015

import './exemplePaginacioModal.html';
import '../../../api/exemplePaginacio/methods.js'
import {crearTest,eliminarTest,editarTest} from '../../../api/exemplePaginacio/methods.js'

Template.testModal.events({
  "click .editar": function(event, template){

    var id        = $('input[name="modalId"]').val();
    var zona      = $('input[name="modalZona"]').val();
    var os        = $('input[name="modalOs"]').val();
    var posicio   = $('input[name="modalPosicio"]').val();
    var centratge = $('input[name="modalCentratge"]').val();

    editarTest.call({
      zona: zona,
      os: os,
      posicio: posicio,
      centratge: centratge,
      id: id
    }, (err,res) => {
      if (err) {
        alert(err);
      } else {
        console.log('Registre editat correctament');
      }
      Modal.hide();
    });


    Meteor.call('editarTest', obj, id);
    Modal.hide();
  },
  "click .eliminar": function(event, template){

    var id        = $('input[name="modalId"]').val();

    eliminarTest.call({
      id: id
    }, (err,res) => {
      if (err) {
        alert(err);
      } else {
        console.log('Registre eliminat correctament');
      }
      Modal.hide();
    });

  },
  "click .desar": function(event, template){

    var zona      = $('input[name="modalZona"]').val();
    var os        = $('input[name="modalOs"]').val();
    var posicio   = $('input[name="modalPosicio"]').val();
    var centratge = $('input[name="modalCentratge"]').val();

    crearTest.call({
      zona: zona,
      os: os,
      posicio: posicio,
      centratge: centratge
    }, (err,res) => {
      if (err) {
        alert(err);
      } else {
        console.log('Registre afegit correctament');
      }
      Modal.hide();
    });

  }
});
Template.testModal.helpers({
  accio: function(){
    var accio = Session.get('accio');
    if (accio === 'editar'){
      return true;
    }else{
      return false;
    }

  }
});
