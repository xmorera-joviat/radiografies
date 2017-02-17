Artefactes = new Mongo.Collection( 'artefactes' );

ArtefactesSchema = new SimpleSchema({
    'nom': {
        type: String,
        label: 'Nom',
        optional: false
    },
    'descripcio': {
        type: String,
        label: 'Descripció',
        optional: true
    }
});

Artefactes.attachSchema( ArtefactesSchema );
