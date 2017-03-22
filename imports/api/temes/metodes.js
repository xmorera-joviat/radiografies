/* Creat per Toni Salvador */
import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { TemaSchema } from './temes.js';

export const editarTema = new ValidatedMethod({
    name: "Temes.edit",
    validate: TemaSchema.validator(),
    run({
        id,
        nom,
        descripcio,
        usuari
    }) {
        if (!this.userId) {
            throw new Meteor.Error("Temes.edit.unauthorized",
                "Permís denegat. Cal estar identificat");
        }
        return Temes.update({
            _id: id
        }, {
            $set: {
                nom: nom,
                descripcio: descripcio,
                usuari: usuari
            }
        });
    }
});

export const crearTema = new ValidatedMethod({
  name: "Temes.add",
  validate: new SimpleSchema({
      nom: {type: String},
      descripcio: {type: String},
      usuari: {type: String}
  }).validator(),
  run({
      nom,
      descripcio,
      usuari
    }) {
    if(!this.userId){
		throw new Meteor.Error("Temes.add.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Temes.insert({nom:nom,descripcio:descripcio});
  }
});
export const eliminarTema = new ValidatedMethod({
  name: "Temes.remove",
  validate: new SimpleSchema({
      id: { type: String}
  }).validator(),
  run({id}) {
    if(!this.userId){
		throw new Meteor.Error("Temes.remove.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Temes.remove({_id: id});
  }
});
