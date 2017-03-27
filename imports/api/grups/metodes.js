import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { Grups } from "../old/collections/grups.js";

export const editarGrups = new ValidatedMethod({
	name: "grups.edit",
	validate: new SimpleSchema({
		 id: { type: String},
		 nom: { type: String},
		 cursId: { type: String},
		 tutorId: { type: String}
	 }).validator(),
	run({id,nom,cursId,tutorId}) {
		if(!this.userId){
			throw new Meteor.Error("grups.edit.unauthorized",
	 		"Permís denegat. Cal estar identificat");
	 	}
	 return Grups.update({_id: id},{$set:{nom:nom,cursId:cursId,tutorId:tutorId}});
 	}
});

export const eliminarGrups = new ValidatedMethod({
	name: "grups.remove",
	validate: new SimpleSchema({
		 id: { type: String}
	 }).validator(),
	run({id}) {
		if(!this.userId){
			throw new Meteor.Error("grups.remove.unauthorized",
	 		"Permís denegat. Cal estar identificat");
	 	}
	 return Grups.remove({_id: id});
 	}
});

export const desarGrups = new ValidatedMethod({
  name: "grup.add",
  validate: new SimpleSchema({
      cursId: {type: String},
			nom: {type: String},
      tutorId: {type: String}
  }).validator(),
  run({
      cursId,
      nom,
      tutorId
    }) {
    if(!this.userId){
		throw new Meteor.Error("grup.add.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Grups.insert({cursId:cursId,nom:nom,tutorId:tutorId});
  }
});
