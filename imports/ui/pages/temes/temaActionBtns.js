/**
 * Created by Toni Salvador i Martí Gual
 */
 Template.temesEditar.events({
 	'click #editar': function(event, template){
 		var obj = {};

     var id         = $('input[name="modalId"]').val();
     obj.nom        = $('input[name="modalNom"]').val();
     obj.descripcio = $('input[name="modalDescripcio"]').val();

     Meteor.call('editarTema', obj, id);
     Modal.hide();
   }
 	}
 });
