import '../../../api/temes/temes.js';
import './temes.html';
//import { Modal } from 'rtmeteor/peppelg:bootstrap-3-modal';
import './modal.js';

Template.temes.events({
	'click tbody > tr': function (event) {
		var dataTable = $(event.target).closest('table').DataTable();
 		var rowData = dataTable.row(event.currentTarget).data();
 		Modal.show('temaModal');
 		$('input[name="modalId"]').val(rowData._id);
 		$('input[name="modalNom"]').val(rowData.nom);
		$('input[name="modalDescripcio"]').val(rowData.descripcio);
		$('input[name="modalUsuari"]').val(rowData.usuari);
 	},
});