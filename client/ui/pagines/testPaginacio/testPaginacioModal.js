Template.testModal.events({
  "click .editar": function(event, template){
    var obj = {};

    var id        = $('input[name="modalId"]').val();
    obj.zona      = $('input[name="modalZona"]').val();
    obj.os        = $('input[name="modalOs"]').val();
    obj.posicio   = $('input[name="modalPosicio"]').val();
    obj.centratge = $('input[name="modalCentratge"]').val();

    Meteor.call('editarTest', obj, id);
    Modal.hide();
  },
  "click .eliminar": function(event, template){
    var id        = $('input[name="modalId"]').val();
    Meteor.call('eliminarTest', id);
    Modal.hide();
  },
  "click .desar": function(event, template){
    var obj = {};

    obj.zona      = $('input[name="modalZona"]').val();
    obj.os        = $('input[name="modalOs"]').val();
    obj.posicio   = $('input[name="modalPosicio"]').val();
    obj.centratge = $('input[name="modalCentratge"]').val();
    
    Meteor.call('crearTest', obj);
    Modal.hide();
  }
});
Template.testModal.helpers({
  accio: function(){
    var accio = Session.get('accio');
    if (accio === 'editar'){
      return true;
    }else{
      return false;
    }

  }
});
