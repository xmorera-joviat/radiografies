import {Modal} from 'meteor/peppelg:bootstrap-3-modal'

import '../../../api/usuaris/tabularUsers.js';
import './usuaris.html';
import './modalCrearUser.js';
import './modal.js'

Template.usuaris.events({
'click tbody > tr': function (event) {
var dataTable = $(event.target).closest('table').DataTable();
var rowData = dataTable.row(event.currentTarget).data();

  Modal.show('usuarisModal', rowData);
  //console.log(rowData);
},

'click .crear': function (event) {
    Modal.show('crearUser');
    }
});
