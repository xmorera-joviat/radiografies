// creat per Raül Lopez
// Més exemples ...

import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { Roles } from 'meteor/alanning:roles';
import { SimpleSchema } from 'meteor/aldeed:simple-schema';

export const afegirRol = new ValidatedMethod({
  name: 'rols.add',
  validate: new SimpleSchema({
    id: { type: String },
    rol: { type: String }
  }).validator(),
  run({ id, rol }) {
    if(!this.userId){
        throw new Meteor.Error('rols.add.unauthorized',
    'No pot realitzar aquesta acció sense estar identificat');
    }
    Roles.addUsersToRoles(id,[rol]);
  }
});
export const eliminarRol = new ValidatedMethod({
  name: 'rols.remove',
  validate: new SimpleSchema({
    id: { type: String },
    rol: { type: String }
  }).validator(),
  run({ id, rol }) {
    if(!this.userId){
        throw new Meteor.Error('rols.remove.unauthorized',
    'No pot realitzar aquesta acció sense estar identificat');
    }
    Roles.removeUsersFromRoles(id,rol);
  }
});
