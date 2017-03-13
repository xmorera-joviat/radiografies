import '../../../api/llico/llico.js';
import './llico.html';

import { Modal } from 'meteor/peppelg:bootstrap-3-modal';
import './modal.js';
Template.llico.events({
  'click tbody > tr': function (event) {
    var dataTable = $(event.target).closest('table').DataTable();
    var rowData = dataTable.row(event.currentTarget).data();

    Modal.show('llicoModal');

    $('input[name="modalId"]').val(rowData._id);
    $('input[name="modalNom"]').val(rowData.llico_nom);
    $('input[name="modalDescripcio"]').val(rowData.descripcio);
    $('input[name="modalPercentatge"]').val(rowData.percentatge);
     },
    });
