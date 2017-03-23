/**
 * Created by Marc on 13/3/17.
 */

import { Meteor } from "meteor/meteor";
import { ValidatedMethod } from "meteor/mdg:validated-method";
import { SimpleSchema } from "meteor/aldeed:simple-schema";
import { GrupSchema, Grups } from './grups.js';

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
        id: {type: String}
    }).validator(),
    run({id}) {
        if(!this.userId){
            throw new Meteor.Error("grups.remove.unauthorized",
                "Permís denegat. Cal estar identificat");
        }
        return Grups.remove({_id: id});
    }
});

export const afegirGrups = new ValidatedMethod({
    name: "grups.afegir",
    validate: new SimpleSchema({
        nom: { type: String},
        cursId: { type: String},
        tutorId: { type: String}
    }).validator(),
    run({nom,cursId,tutorId}) {
        if(!this.userId){
            throw new Meteor.Error("grups.edit.unauthorized",
                "Permís denegat. Cal estar identificat");
        }
        return Grups.insert({nom:nom,cursId:cursId,tutorId:tutorId});
    }
});