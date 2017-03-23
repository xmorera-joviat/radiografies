import '../../../api/usuaris/metodes.js';
import './crearUserModal.html';
import {crearUsers} from '../../../api/usuaris/metodes.js';
import { Accounts } from 'meteor/accounts-base'

Template.crearUser.events({
  "click .nou": function(){

    var modal_nom = $('input[name="modalNom"]').val();
    var modal_email = $('input[name="modalEmail"]').val();

  crearUsers.call({
      emails: modal_email,
      name: modal_nom

    //  Accounts.setUsername(userId, modal_nom,modal_email)
    }, (err,res) => {
        if (err) {
          alert(err);
        } else {
          console.log('Registre editat correctament');
        }
        Modal.hide();
      });
},
'change #nom': function(){
  console.log('hola');
}
});
