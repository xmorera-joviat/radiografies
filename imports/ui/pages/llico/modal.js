import './modal.html';
import { editarLlico } from '../../../api/llico/metodes.js';

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

   eliminarLlico.call();

 }
});
