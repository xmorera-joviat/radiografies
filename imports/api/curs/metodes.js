/* Mètodes per cursos */
import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { CursSchema, Curs } from './curs.js';

export const editarCurs = new ValidatedMethod({
    name: "Curs.edit",
    validate: CursSchema.validator(),
    run({
        id,
        nom,
        descripcio,
        created_by
    }) {
        if (!this.userId) {
            throw new Meteor.Error("Curs.edit.unauthorized",
                "Permís denegat. Cal estar identificat");
        }
        return Curs.update({
            _id: id
        }, {
            $set: {
                nom: nom,
                descripcio: descripcio,
                created_by: created_by
            }
        });
    }
});

export const crearCurs = new ValidatedMethod({
  name: "Curs.add",
  validate: CursSchema.validator(),
  run({
      nom,
      descripcio,
      created_by
    }) {
    if(!this.userId){
		throw new Meteor.Error("Curs.add.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Curs.insert({nom:nom,descripcio:descripcio, created_by:created_by});
  }
});
export const eliminarCurs = new ValidatedMethod({
  name: "Curs.remove",
  validate: CursSchema.validator(),
  run({id}) {
    if(!this.userId){
		throw new Meteor.Error("Curs.remove.unauthorized",
        "Permís denegat. Cal estar identificat");
	}
	return Curs.remove({_id: id});
  }
});
