//Raül López
import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { Respostes } from "./respostes.js";
import fs from 'fs';

export const editarRespostes = new ValidatedMethod({
  name: "respostes.edit",
  validate: new SimpleSchema({
     id: { type: String},
     focus: { type: String},
     camLeft: {type: String, optional: true},
     camCent: {type: String, optional: true},
     camRight: {type: String, optional: true},
     bucky: {type: String},
     xassis: {type: String},
     kw: {type: String},
     mas: {type: String},
     dfo: {type: String},
     img: {type: String},
     observacions: {type: String},
     uploader: {type: String},
     validador: {type: String, optional: true},
     validada: {type: Boolean}
   }).validator(),
  run({id,focus, camLeft, camCent, camRight, bucky, xassis, kw, mas, dfo, img, observacions, uploader, validador, validada}) {
      if(!this.userId){
        throw new Meteor.Error("respostes.edit.unauthorized",
         "Permís denegat. Cal estar identificat");
      }
      return Respostes.update({_id: id},{$set:{focus:focus, camLeft:camLeft, camRight:camRight , bucky:bucky , xassis:xassis , kw:kw , mas:mas, dfo:dfo , img:img , observacions:observacions , uploader:uploader , validador:validador , validada:validada}});
  }
});

  export const eliminarRespostes = new ValidatedMethod({
    name: "respostes.remove",
    validate: new SimpleSchema({
       id: { type: String}
     }).validator(),
    run({id}) {
        if(!this.userId){
          throw new Meteor.Error("respostes.remove.unauthorized",
           "Permís denegat. Cal estar identificat");
        }
        return Respostes.remove({_id: id});
    }
});
export const insertRespostes = new ValidatedMethod({
  name: "respostes.insert",
  validate: new SimpleSchema({
    focus: { type: String},
    camLeft: {type: String, optional: true},
    camCent: {type: String, optional: true},
    camRight: {type: String, optional: true},
    bucky: {type: String},
    xassis: {type: String},
    kw: {type: String},
    mas: {type: String},
    dfo: {type: String},
    img: {type: String},
    observacions: {type: String},
    uploader: {type: String},
    validador: {type: String, optional:true},
    validada: {type: Boolean}
   }).validator(),
  run({focus, camLeft, camCent, camRight, bucky, xassis, kw, mas, dfo, img, observacions, uploader, validador, validada}) {
      if(!this.userId){
        throw new Meteor.Error("respostes.insert.unauthorized",
         "Permís denegat. Cal estar identificat");
      }
      return Respostes.insert({focus:focus, camLeft:camLeft, camRight:camRight , bucky:bucky , xassis:xassis , kw:kw , mas:mas, dfo:dfo , img:img , observacions:observacions , uploader:uploader , validador:validador , validada:validada});
  }
});
