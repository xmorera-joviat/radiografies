import './modal.html'
import { editarTema } from '../../../api/temesToni/metodes.js';

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
}
})
