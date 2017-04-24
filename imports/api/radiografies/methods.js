//Raül López
import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { Radiografies } from "./radiografies.js";
import fs from 'fs';

export const editarRadiografia = new ValidatedMethod({
  name: "radiografies.edit",
  validate: new SimpleSchema({
     id: { type: String},
     status: { type: Number},
     ext: {type: String}
   }).validator(),
  run({id,status, ext}) {
      if(!this.userId){
        throw new Meteor.Error("radiografies.edit.unauthorized",
         "Permís denegat. Cal estar identificat");
      }
      return Radiografies.update({_id: id},{$set:{status:status, ext:ext}});
  }
});

  export const eliminarRadiografia = new ValidatedMethod({
    name: "radiografies.remove",
    validate: new SimpleSchema({
       id: { type: String}
     }).validator(),
    run({id}) {
        if(!this.userId){
          throw new Meteor.Error("radiografies.remove.unauthorized",
           "Permís denegat. Cal estar identificat");
        }
        return Radiografies.remove({_id: id});
    }
});
export const insertRadiografia = new ValidatedMethod({
  name: "radiografies.insert",
  validate: new SimpleSchema({
     status: { type: Number},
     ext: {type: String}
   }).validator(),
  run({nomFitxer,status,ext}) {
      if(!this.userId){
        throw new Meteor.Error("radiografies.insert.unauthorized",
         "Permís denegat. Cal estar identificat");
      }
      return Radiografies.insert({status:status,ext:ext});
  }
});

function tractament(imatge){
  var path = Npm.require('path');
  var base = path.resolve('.');
  base = base.split('.meteor')[0];
  //obtenim l'extensio del fitxer sobre el que estem treballant
  extensio = path.extname(imatge);
  //fem l'insert i obtenim la id generada
  id = Radiografies.insert({status:0,ext:extensio});

  //movem el fitxer de la carpeta imports a definitives canviant-li el nom per el de la id. Així no tindrem noms repetits.
  fs.renameSync(base + 'public/radiografies/importar/' + imatge, base + 'public/radiografies/definitives/' + id + extensio);
  console.log('radiografia creada amb id: ' + id);
}

export default function () {
      var imatges = [];
      var radiografia;

      //cerquem el path del servidor
      var path = Npm.require('path');
      var base = path.resolve('.');
      base = base.split('.meteor')[0];

      //array amb el contingut del directori importar
      imatges = fs.readdirSync(base + 'public/radiografies/importar');

      //comprovo que si a l'array hi han fitxers
      if (imatges != undefined && imatges.length != 0) {
          var len = imatges.length;
          var extensio;
          var id;

          //per cada imatge de l'array, es fa un insert a la base de dades, es recupera la id de l'insert i es mou la imatge
          //al directori de definitives canvian-li el nom per la id anterior.
          for (var i = 0; i < len; i++) {
            tractament(imatges[i]);
          }

      } else {
        console.log('No s´han trobat radiografies a importar.');
        console.log('Iniciant servidor');
      }

  }

export const checkRadiografiesEnProces = function () {
    // status 0 - radiografia sense tractar
    // status 1 - radiografia reservada per a parametritzar-la
    // status 2 - radiografia parametritzada però sense validar
    // status 3 - radiografia reservada per a validació
    // status 4 - radiografia validada --> aquestes són les úniques que s´han de fer servir per les preguntes.
    // Per tant hem de cercar radigrafies amb status 1 a l'startup i passar-les de nou a status 0, perquè quedin de nou disponibles per parametritzar.
    // I radiografies de status 3 baixar-les a 2 per tal que quedin disponibles per validació.
}
