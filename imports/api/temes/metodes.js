import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { Tema } from "../old/collections/tema.js";

export const crearTema = new ValidatedMethod({
  name: "tema.add",
  validate: new SimpleSchema({
 	  nom: { type: String},
 	  descripcio: { type: String},
 	  usuari: { type: String}
    }).validator(),
  run({nom,descripcio,usuari}) {
    if(!this.userId){
		throw new Meteor.Error("tema.add.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Tema.insert({nom:nom,descripcio:descripcio,usuari:usuari});
  }
});
export const editarTema = new ValidatedMethod({
	name: "tema.edit",
	validate: new SimpleSchema({
 	id: { type: String},
 	nom: { type: String},
 	descripcio: { type: String},
 	usuari: { type: String}
 	}).validator(),
 	run({id,nom,descripcio,usuari}) {
 		if(!this.userId){
				throw new Meteor.Error("tema.edit.unauthorized",
 			"Permís denegat. Cal estar identificat");
 		}
 	return Tema.update({_id: id},{$set:{nom:nom,descripcio:descripcio,usuari:usuari}});
 	}
});
export const eliminarTema = new ValidatedMethod({
  name: "tema.remove",
  validate: new SimpleSchema({
      id: { type: String}
  }).validator(),
  run({id}) {
    if(!this.userId){
		throw new Meteor.Error("tema.remove.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Tema.remove({_id: id});
  }
});