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