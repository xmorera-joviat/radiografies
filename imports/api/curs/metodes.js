/* Mètodes per cursos */
import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { CursSchema, Curs } from './curs.js';

export const editarCurs = new ValidatedMethod({
    name: "editarCurs",
    validate: CursSchema.validator(),
    run({
        id,
        nom,
        descripcio
    }) {
        if (!this.userId) {
            throw new Meteor.Error("editarCurs.unauthorized",
                "Permís denegat. Cal estar identificat");
        }
        return Curs.update({
            _id: id
        }, {
            $set: {
                nom: nom,
                descripcio: descripcio
            }
        });
    }
});

export const crearCurs = new ValidatedMethod({
  name: "Curs.add",
  validate: new SimpleSchema({
      nom: {type: String},
      descripcio: {type: String}
  }).validator(),
  run({
      nom,
      descripcio,
      usuari
    }) {
    if(!this.userId){
		throw new Meteor.Error("Curs.add.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Curs.insert({nom:nom,descripcio:descripcio});
  }
});
export const eliminarCurs = new ValidatedMethod({
  name: "Curs.remove",
  validate: new SimpleSchema({
      id: { type: String}
  }).validator(),
  run({id}) {
    if(!this.userId){
		throw new Meteor.Error("Curs.remove.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Curs.remove({_id: id});
  }
});
