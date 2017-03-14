// creat per Raül López
// Exemple per veure la sintaxi ES2015

import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { Test } from "./exemplePaginacio.js";

export const crearTest = new ValidatedMethod({
  name: "test.add",
  validate: new SimpleSchema({
      zona: { type: String},
      os: { type: String},
      posicio: { type: String},
      centratge: { type: String, min: 1}
    }).validator(),
  run({zona,os,posicio,centratge}) {
    if(!this.userId){
		throw new Meteor.Error("test.add.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Test.insert({zona:zona,os:os,posicio:posicio,centratge:centratge});
  }
});
export const editarTest = new ValidatedMethod({
  name: "test.edit",
  validate: new SimpleSchema({
      zona: { type: String},
      os: { type: String},
      posicio: { type: String},
      centratge: { type: String},
      id: { type: String}
    }).validator(),
  run({id,zona,os,posicio,centratge}) {
    if(!this.userId){
		throw new Meteor.Error("test.edit.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Test.update({_id: id},{$set:{zona:zona,os:os,posicio:posicio,centratge:centratge}});
  }
});
export const eliminarTest = new ValidatedMethod({
  name: "test.remove",
  validate: new SimpleSchema({
      id: { type: String}
  }).validator(),
  run({id}) {
    if(!this.userId){
		throw new Meteor.Error("test.remove.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Test.remove({_id: id});
  }
});
