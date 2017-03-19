//Jordi Farre
import '../../../api/llicons/llicons.js';
import './llicons.html';
import { Modal } from 'meteor/peppelg:bootstrap-3-modal';
import { Session } from 'meteor/session';
import './modal.js';

Template.llicons.events({
 'click tbody > tr': function (event) {
   Session.set("accio","editar");
 var dataTable = $(event.target).closest('table').DataTable();
 var rowData = dataTable.row(event.currentTarget).data();
 Modal.show('llicoModal');
$('input[name="modalId"]').val(rowData._id);
$('input[name="modalNom"]').val(rowData.llico_nom);
$('input[name="modalOrdre"]').val(rowData.ordre_llico);
$('input[name="modalDescripcio"]').val(rowData.descripcio);
$('input[name="modalPercentatge"]').val(rowData.percentatge);
 },
 'click .insertar': function (event){
   Session.set("accio","insertar");
   Modal.show('llicoModal');
 },
});
