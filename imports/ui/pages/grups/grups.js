import '../../../api/grups/grups.js';
import './grups.html';
import { Modal } from 'meteor/peppelg:bootstrap-3-modal';
import './modal.js';

Template.grups.events({
	'click tbody > tr': function (event) {
		var accio = Session.set("accio","editar");
		var dataTable = $(event.target).closest('table').DataTable();
	 	var rowData = dataTable.row(event.currentTarget).data();
		Modal.show('grupModal');
		$('input[name="modalId"]').val(rowData._id);
		$('input[name="modalNom"]').val(rowData.nom);
		$('input[name="modalCursId"]').val(rowData.cursId);
		$('input[name="modalTutorId"]').val(rowData.tutorId);
	},
	'click .insertar': function (event) {
		var accio = Session.set("accio","insertar");
		Modal.show('grupModal');
	}
});