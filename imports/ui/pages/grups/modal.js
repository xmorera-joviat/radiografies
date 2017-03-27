import './modal.html';
import '../../../api/grups/metodes.js';
import { editarGrups } from '../../../api/grups/metodes.js'
import { eliminarGrups } from '../../../api/grups/metodes.js'
import { afegirGrups } from '../../../api/grups/metodes.js'
import { Session } from 'meteor/session';
import {Curs} from '../../../api/curs/curs.js';

/*
var accio = session.set("accio");

Template.grup
*/
Template.grupModal.events({

    "click .editar": function(){

        var modal_id = $('input[name="modalId"]').val();
        var modal_nom = $('input[name="modalNom"]').val();
        var modal_curs_id = $('input[name="modalDescripcio"]').val();
        var modal_tutor_id = $('input[name="modalUsuari"]').val();

        editarGrups.call({
            id: modal_id,
            nom: modal_nom,
            cursId: modal_curs_id,
            tutorId: modal_tutor_id
        }, (err,res) => {
            if (err) {
                alert(err);
            } else {
                console.log('Registre editat correctament');
            }
            Modal.hide();
        });
    },

    "click .insertar": function(){



        var modal_nom = $('input[name="modalNom"]').val();
        var modal_curs_id = $('input[name="modalDescripcio"]').val();
        var modal_tutor_id = $('input[name="modalUsuari"]').val();

        afegirGrups.call({
            nom: modal_nom,
            cursId: modal_curs_id,
            tutorId: modal_tutor_id
        }, (err,res) => {
            if (err) {
                alert(err);
            } else {
                console.log('Registre insertat correctament');
            }
            Modal.hide();
        });
    },

    "click .borrar": function(){

        var modal_id = $('input[name="modalId"]').val();

        eliminarGrups.call({
            id: modal_id,
        }, (err,res) => {
            if (err) {
                alert(err);
            } else {
                console.log('Registre borrat correctament');
            }
            Modal.hide();
        });
    }


});

Template.grupModal.helpers({
    accio: function(){
        var accio = Session.get('accio');
        if (accio === 'insertar'){
            return true;
        }else{
            return false;
        }

    },
    curs: function(){
      return Curs.find()
    }
});
