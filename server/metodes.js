//creat per Raül López
Meteor.methods({
  /**********************************+ TEST PAGINACIO *********************************/
  editarTest: function (object,id) {
    var currentUserId = Meteor.userId();
    if(currentUserId){
      Test.update({_id: id},{$set: object});
    }
  },
  eliminarTest: function (id) {
    var currentUserId = Meteor.userId();
    if(currentUserId){
      Test.remove({_id: id});
    }
  },
  crearTest: function (obj) {
    var currentUserId = Meteor.userId();
    if(currentUserId){
      Test.insert(obj);
    }
  },
  afegirRol: function (id,rol) {
    Roles.addUsersToRoles(id,[rol]);
  },
  eliminarRol: function (id,rol) {
    Roles.removeUsersFromRoles(id,rol);
  }

  /**********************************+ TEST PAGINACIO *********************************/
});
