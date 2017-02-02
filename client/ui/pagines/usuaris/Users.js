Template.users.onCreated(function(){
  this.autorun(()=>{
    Meteor.subscribe('allUsers');
    //podem fer this pq fem servir una arrow function sinó hauriem
    //de fer that i declarar un var that = this fora de l'autorun.
  });
});
Template.users.helpers({
  users: function() {
    return Meteor.users.find();
  },
  userEmail: function() {
    return this.emails[0].address;
  },
  isAdmin: function() {
    return Roles.userIsInRole(this._id, 'admin') ? 'admin' : '';
  },
  rols: function() {
    return Roles.getRolesForUser(this._id);
  }
});
Template.users.events({
  'change .addRol': function() {
    var rol = $('.addRol').val();
    Meteor.call('afegirRol', this._id, rol);
  },
  'change .delRol': function() {
    var rol = $('.delRol').val();
    Meteor.call('eliminarRol', this._id, rol);
  }
})
