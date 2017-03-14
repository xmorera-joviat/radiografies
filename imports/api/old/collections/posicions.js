export const Posicions = new Mongo.Collection( 'posicions' );

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
        label: 'Posició',
        optional: true
    },
    'centratge': {
        type: String,
        label: 'Centratge',
        optional: true
    }
});

Posicions.attachSchema( PosicionsSchema );
