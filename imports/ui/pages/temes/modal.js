import './modal.html';
import { editarTema,crearTema,eliminarTema } from '../../../api/temes/metodes.js';
Template.temaModal.events({
 "click .editar": function(){
 	var modal_id = $('input[name="modalId"]').val();
 	var modal_nom = $('input[name="modalNom"]').val();
 	var modal_descripcio = $('input[name="modalDescripcio"]').val();
 	var modal_usuari = $('input[name="modalUsuari"]').val();
  
  editarTema.call({
 	id: modal_id,
 	nom: modal_nom,
 	descripcio: modal_descripcio,
 	usuari: modal_usuari
 	}, (err,res) => {
 		if (err) {
 			alert(err);
 		} else {
 			console.log('Registre editat correctament');
 		}
 	Modal.hide();
 });
},
"click .eliminar": function(event, template){

    var id        = $('input[name="modalId"]').val();

    eliminarTema.call({
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

 	var modal_nom = $('input[name="modalNom"]').val();
 	var modal_descripcio = $('input[name="modalDescripcio"]').val();
 	var modal_usuari = Meteor.userId();

    crearTema.call({

 	  nom: modal_nom,
 	  descripcio: modal_descripcio,
 	  usuari: modal_usuari
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
Template.temaModal.helpers({
  accio: function(){
    var accio = Session.get('accio');
    return (accio == 'editar') ? true : false;

  }
});