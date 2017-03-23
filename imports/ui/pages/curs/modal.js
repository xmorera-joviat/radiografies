/* Creat per Toni Salvador */
import './modal.html';
import { crearCurs,editarCurs,eliminarCurs } from '../../../api/curs/metodes.js'

Template.cursModal.events({
 "click .editar": function(event, template){
    var modal_id = $('input[name="modalId"]').val();
    var modal_nom = $('input[name="modalNom"]').val();
    var modal_descripcio = $('input[name="modalDescripcio"]').val();

  editarCurs.call({
  id: modal_id,
  nom: modal_nom,
  descripcio: modal_descripcio
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

  var id = $('input[name="modalId"]').val();

  eliminarCurs.call({
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
  console.log ("dins desar curs");
  crearCurs.call({
    nom: modal_nom,
	descripcio: modal_descripcio
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
Template.cursModal.helpers({
  accio: function(){
    var accio = Session.get('accio');
    if (accio === 'editar'){
      return true;
    }else{
      return false;
    }

  }
});
