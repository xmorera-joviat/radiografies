import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { Accounts } from 'meteor/accounts-base'
//import { Accounts } from 'meteor/std:accounts-ui';

//Update
export const editarUsers = new ValidatedMethod({
  name: "users.edit",
  validate: new SimpleSchema({
    id: {type: String},
    emails: {type: String},
    name: {type: String},
  }).validator(),

run({id,emails,name}) {
  if(!this.userId){
    throw new Meteor.Error("Meteor.users.edit.unauthorized",
    "Permís denegat. Cal estar identificat");
    }
    //Meteor.Accounts.setUsername(id, name);
    //return Meteor.users.update({_id: id},{$set:{address:emails,profile:name}});

    return Meteor.users.update({_id:id},{$set:{"emails[0].address":emails,"profile.name":name}});
  }
});
//Delete
export const borrarUsers = new ValidatedMethod({
  name: "users.delete",
  validate: new SimpleSchema({
    id: {type: String}
  }).validator(),

run({id}) {
  if(!this.userId){
    throw new Meteor.Error("Meteor.users.edit.unauthorized",
    "Permís denegat. Cal estar identificat");
    }
    //Meteor.Accounts.setUsername(id, name);
    //return Meteor.users.update({_id: id},{$set:{address:emails,profile:name}});

    return Meteor.users.remove({_id:id});
  }
});
//Create
export const crearUsers = new ValidatedMethod({
  name: "users.create",
  validate: new SimpleSchema({
    emails: {type: String},
    name: {type: String},
  }).validator(),

run({emails,name}) {
  if(!this.userId){
    throw new Meteor.Error("Meteor.users.edit.unauthorized",
    "Permís denegat. Cal estar identificat");
    }
    //Meteor.Accounts.setUsername(id, name);
    //return Meteor.users.update({_id: id},{$set:{address:emails,profile:name}});
    let pfl = {'name': name};
    let mail = [{"address": emails, "verified": false}];

    return Meteor.users.insert({emails:mail,profile:pfl});
  }
});
