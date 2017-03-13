import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { Llico } from "../old/collections/llico.js";

export const editarLlico = new ValidatedMethod({
  name: "llico.edit",
  validate: new SimpleSchema({
    id: { type: String},
    nom: { type: String},
    percentatge: { type: String},
    descripcio: { type: String}
   }).validator(),
   run({id,nom,percentatge,tema_tema_id,ordre_llico,tipusllico_id,descripcio}) {
     if(!this.userId){
      throw new Meteor.Error("llico.edit.unauthorized",
       "Permís denegat. Cal estar identificat");
       }
       return Llico.update({_id: id},{$set:{llico_nom:nom,descripcio:descripcio,percentatge:percentatge}});
       }
      });

      export const eliminarLlico = new ValidatedMethod({
        name: "llico.remove",
        validate: new SimpleSchema({
          id: { type: String},
          nom: { type: String},
          percentatge: { type: String},
          descripcio: { type: String}
         }).validator(),
         run({id,nom,percentatge,tema_tema_id,ordre_llico,tipusllico_id,descripcio}) {
           if(!this.userId){
            throw new Meteor.Error("llico.remove.unauthorized",
             "Permís denegat. Cal estar identificat");
             }
             return Llico.remove({_id: id},{$set:{llico_nom:nom,descripcio:descripcio,percentatge:percentatge}});
             }
            });
