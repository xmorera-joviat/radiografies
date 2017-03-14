//creat per Raül López
// Més exemples ...
import {Meteor} from 'meteor/meteor';
import {Roles} from 'meteor/alanning:roles'
import './Rols.html';
import { afegirRol,eliminarRol } from '../../../api/rols/methods.js';

Template.rols.onCreated(function(){
  this.autorun(()=>{
    Meteor.subscribe('allUsers');
    //podem fer this pq fem servir una arrow function sinó hauriem
    //de fer that i declarar un var that = this fora de l'autorun.
  });
});
Template.rols.helpers({
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
Template.rols.events({
  'change .addRol': function() {
    var rol = $('.addRol').val();

    afegirRol.call({
      id: this._id,
      rol: rol
    }, (err,res) => {
      if (err) {
        alert(err);
      } else {
        console.log('Rol afegit correctament');
      }
    });

  },
  'change .delRol': function() {
    var rol = $('.delRol').val();

    eliminarRol.call({
      id: this._id,
      rol: rol
    }, (err,res) => {
      if (err) {
        alert(err);
      } else {
        console.log('Rol eliminat correctament');
      }
    });
  }
})
