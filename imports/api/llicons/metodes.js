// Jordi Farre
import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { Llico } from "../old/collections/llico.js";

export const editarLlico = new ValidatedMethod({
  name: "llico.edit",
  validate: new SimpleSchema({
     id: { type: String},
     llico_nom: { type: String},
     percentatge: { type: Number},
     descripcio: { type: String}
   }).validator(),
  run({id,llico_nom,percentatge,tema_tema_id,ordre_llico,tipusllico_id,descripcio}) {
      if(!this.userId){
        throw new Meteor.Error("llico.edit.unauthorized",
         "Permís denegat. Cal estar identificat");
      }
      return Llico.update({_id: id},{$set:{llico_nom:llico_nom,percentatge:percentatge,descripcio:descripcio}});
  }
});

  export const eliminarLlico = new ValidatedMethod({
    name: "llico.remove",
    validate: new SimpleSchema({
       id: { type: String}
     }).validator(),
    run({id}) {
        if(!this.userId){
          throw new Meteor.Error("llico.remove.unauthorized",
           "Permís denegat. Cal estar identificat");
        }
        return Llico.remove({_id: id});
    }
});
export const insertarLlico = new ValidatedMethod({
  name: "llico.insert",
  validate: new SimpleSchema({
     llico_nom: { type: String},
     percentatge: { type: Number},
     descripcio: { type: String}
   }).validator(),
  run({llico_nom,percentatge,descripcio}) {
      if(!this.userId){
        throw new Meteor.Error("llico.insert.unauthorized",
         "Permís denegat. Cal estar identificat");
      }
      return Llico.insert({llico_nom:llico_nom,percentatge:percentatge,descripcio:descripcio});
  }
});
