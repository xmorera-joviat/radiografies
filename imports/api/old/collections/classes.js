Classes = new Mongo.Collection( 'classes' );


ClassesSchema = new SimpleSchema({
    'nom': {
        type: String,
        label: 'Nom',
        optional: true,
        min: 12
    },
    'dataCreacio': {
      type: String,
      label: "Data alta del curs"
    }
});


Classes.attachSchema(ClassesSchema);
