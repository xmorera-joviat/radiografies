import '../../../api/temes/temes.js';
import './temes.html';
//import { Modal } from 'rtmeteor/peppelg:bootstrap-3-modal';
import './modal.js';
import { Tema } from '../../../api/old/collections/tema.js';

Template.temes.events({
	'click tbody > tr': function (event) {
		Session.set('accio','editar');
		var dataTable = $(event.target).closest('table').DataTable();
 		var rowData = dataTable.row(event.currentTarget).data();
 		Modal.show('temaModal');
 		$('input[name="modalId"]').val(rowData._id);
 		$('input[name="modalNom"]').val(rowData.nom);
		$('input[name="modalDescripcio"]').val(rowData.descripcio);
		$('input[name="modalUsuari"]').val(rowData.usuari);
 	},
 	'click .crear': function (event) {
 		Session.set('accio','crear');
 		Modal.show('temaModal');
 		$('input[name="modalUsuari"]').val(Meteor.user().profile.name);
 	}
});
Template.usuariNom.helpers({
	nomUsuari: function(){
		var nomUsuari = Meteor.users.find({id: Tema.usuari});
		console.log(nomUsuari);
		return nomUsuari;

	}
	
});