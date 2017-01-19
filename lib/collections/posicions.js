Posicions = new Mongo.Collection( 'posicions' );

PosicionsSchema = new SimpleSchema({
    'zona': {
        type: String,
        label: 'Zona anatòmica'
    },
    'os': {
        type: String,
        label: 'Ós'
    },
    'posicio': {
        type: String,
        label: 'Posició'
    },
    'centratge': {
        type: String,
        label: 'Centratge'
    }
});

Posicions.attachSchema( PosicionsSchema );
