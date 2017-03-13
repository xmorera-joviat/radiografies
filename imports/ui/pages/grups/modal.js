import './modal.html';
import '../../../api/grups/metodes.js';
import { editarGrups } from '../../../api/grups/metodes.js';
import { eliminarGrups } from '../../../api/grups/metodes.js';


Template.grupModal.events({
	"click .editar": function(){
	var modal_id = $('input[name="modalId"]').val();
	var modal_nom = $('input[name="modalNom"]').val();
	var modal_curs = $('input[name="modalCursId"]').val();
	var modal_tutor = $('input[name="modalTutorId"]').val();

	editarGrups.call({
		id: modal_id,
		nom: modal_nom,
		cursId: modal_curs,
		tutorId: modal_tutor
		}, (err,res) => {
			if (err) {
				alert(err);
			} else {
				console.log('Registre editat correctament');
			}
		Modal.hide();
		});

 },
	"click .eliminar": function(){
	var modal_id = $('input[name="modalId"]').val();

	eliminarGrups.call({
		id: modal_id
		}, (err,res) => {
			if (err) {
				alert(err);
			} else {
				console.log('Registre editat correctament');
			}
		Modal.hide();
		});

 }
});