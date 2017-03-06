// Creat per Aitor G. Vall

import { SimpleSchema } from 'meteor/aldeed:simple-schema';

export const Grups = new Mongo.Collection( 'grups' );
console.log("grups.js");
GrupsSchema = new SimpleSchema({
    'nom': {
        type: String,
        label: 'Nom',
        optional: false
    },
    'cursId': {
        type: String,
        label: 'Curs ID',
        optional: false
    },
    'tutorId': {
        type: String,
        label: 'tutor ID',
        optional: false
    }
});

Grups.attachSchema( GrupsSchema );
