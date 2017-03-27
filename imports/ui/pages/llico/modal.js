import './modal.html';
import { editarLlico } from '../../../api/llico/metodes.js';
import { eliminarLlico } from '../../../api/llico/metodes.js';
import { insertarLlico } from '../../../api/llico/metodes.js';
import { Session } from 'meteor/session';

Template.llicoModal.events({
 "click .editar": function(){

   var modal_id = $('input[name="modalId"]').val();
   var modal_nom = $('input[name="modalNom"]').val();
   var modal_descripcio = $('input[name="modalDescripcio"]').val();
   var modal_percentatge = $('input[name="modalPercentatge"]').val();

   editarLlico.call({
     id: modal_id,
     nom: modal_nom,
     descripcio: modal_descripcio,
     percentatge: modal_percentatge
     }, (err,res) => {
     if (err) {
     alert(err);
     } else {
     console.log('Registre editat correctament');
     }
     Modal.hide();
   });
 },

   "click .borrar": function(){

     var modal_id = $('input[name="modalId"]').val();

     eliminarLlico.call({
       id: modal_id,
       }, (err,res) => {
       if (err) {
       alert(err);
       } else {
       console.log('Registre borrat correctament');
       }
       Modal.hide();
     });
   },

   "click .insertar": function(){

     var modal_nom = $('input[name="modalNom"]').val();
     var modal_descripcio = $('input[name="modalDescripcio"]').val();
     var modal_percentatge = $('input[name="modalPercentatge"]').val();

     insertarLlico.call({
       nom: modal_nom,
       descripcio: modal_descripcio,
       percentatge: modal_percentatge
       }, (err,res) => {
       if (err) {
       alert(err);
       } else {
       console.log('Registre insertat correctament');
       }
       Modal.hide();
     });
   }
});

Template.llicoModal.helpers({
  accio : function() {
    var accio = Session.get('accio');
    if(accio == 'insertar'){
      return true;
    }
    else {
      return false;
    }
  }
});
