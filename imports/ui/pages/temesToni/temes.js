import '../../../api/temesToni/temes.js';
import './temes.html';
import { Modal } from 'meteor/peppelg:bootstrap-3-modal';
import './modal.js';

Template.temes.events({
    'click tbody > tr': function(event) {
        var dataTable = $(event.target).closest('table').DataTable();
        var rowData = dataTable.row(event.currentTarget).data();

        Session.set('accio','editar');
        Modal.show('temaModal');

        $('input[name="modalId"]').val(rowData._id);
        $('input[name="modalNom"]').val(rowData.nom);
        $('input[name="modalDescripcio"]').val(rowData.descripcio);
        $('input[name="modalUsuari"]').val(rowData.usuari);
    },
    'click .crear': function() {
      Session.set('accio','crear');
      Modal.show('temaModal')
    }
});
