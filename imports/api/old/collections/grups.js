// Creat per Aitor G. Vall
export const Grups = new Mongo.Collection( 'grups' );

GrupsSchema = new SimpleSchema({
    'nom': {
        type: String,
        label: 'Nom',
        optional: false
    },
    'cursId': {
        type: String,
        label: 'Curs ID',
        optional: true
    },
    'tutorId': {
        type: String,
        label: 'tutor ID',
        optional: false
    }
});

Grups.attachSchema( GrupsSchema );
