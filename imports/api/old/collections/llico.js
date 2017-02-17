// Creat per Marc Vila i Jordi Real
export const Llico = new Mongo.Collection( 'llico' );

LlicoSchema = new SimpleSchema({
    'llico_nom': {
        type: String,
        label: 'Nom',
        optional: true
    },
    'percentatge': {
        type: Number,
        label: 'Percentatge',
        optional: true
    },
    'tema_tema_id': {
        type: String,
        label: 'Tema ID',
        optional: false
    },
    'ordre_llico': {
        type: Number,
        label: 'Ordre Lliçó',
        optional: true
    },
    'tipusllico_id': {
        type: Number,
        label: 'Tipus lliçó ID',
        optional: false
    },
    'descripcio': {
        type: String,
        label: 'Descripció',
        optional: true
    }
});

Llico.attachSchema( LlicoSchema );
