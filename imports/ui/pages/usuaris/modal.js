import '../../../api/usuaris/metodes.js';
import './modal.html';
import {editarUsers} from '../../../api/usuaris/metodes.js';
import {borrarUsers} from '../../../api/usuaris/metodes.js';
import { Accounts } from 'meteor/accounts-base'

Template.usuarisModal.helpers({
  email: function(e){
    return e.emails[0].address;
  }
});

Template.usuarisModal.events({
  "click .editar": function(){

    var userId = $('input[name="modal_Id"]').val();
    var modal_nom = $('input[name="modalNom"]').val();
    var modal_email = $('input[name="modalEmail"]').val();


  editarUsers.call({
      id: userId,
      emails: modal_email,
      name: modal_nom,

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
  "click .borrar": function(){
    var userId = $('input[name="modal_Id"]').val();

    borrarUsers.call({
      id: userId
    }, (err,res) => {
      if(err){
        alert(err);
      }else {
        alert('Usuari esborrat correctament')
      }
      Modal.hide();
    });
  },

/**  var userId = $('input[name="modal_Id"]').val();
  var modal_nom = $('input[name="modalNom"]').val();
  var modal_email = $('input[name="modalEmail"]').val();

crearUsers.call({
    id: userId,
    emails: modal_email,
    name: modal_nom,

  //  Accounts.setUsername(userId, modal_nom,modal_email)
  }, (err,res) => {
      if (err) {
        alert(err);
      } else {
        console.log('Registre editat correctament');
      }
      Modal.hide();
    });
}*/
});
