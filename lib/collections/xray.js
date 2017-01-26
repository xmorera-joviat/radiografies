Xray = new Mongo.Collection( 'xray' );

XraySchema = new SimpleSchema({
    'param1': {
        type: Number,
        label: 'Paràmetre 1',
        optional: false
    },
    'param2': {
        type: Number,
        label: 'Paràmetre 2',
        optional: false
    },
    'param3': {
        type: Number,
        label: 'Paràmetre 3',
        optional: false
    },
    'ext': {
        type: String,
        label: 'Extensió',
        optional: false
    },
    'camLeft': {
        type: Number,
        label: 'Camera esquerra',
        optional: true
    },
    'camCenter': {
        type: Number,
        label: 'Camera central',
        optional: true
    },
    'camRight': {
        type: Number,
        label: 'Camera dreta',
        optional: true
    },
    'bucky': {
        type: String,
        label: 'bucky',
        optional: false
    },
    'focus': {
        type: String,
        label: 'focus',
        optional: false
    },
    'zona': {
        type: Number,
        label: 'zona',
        optional: false
    },
    'os': {
        type: Number,
        label: 'os',
        optional: false
    },
    'data': {
        type: Date,
        label: 'Data',
        optional: false
    },
    'validada': {
        type: Boolean,
        label: 'validació',
        optional: false
    },
    'userId': {
        type: String,
        label: 'id usuari',
        optional: false
    },
    'posicioId': {
        type: Number,
        label: 'id de la posició',
        optional: false
    },
    'centratgeId': {
        type: Number,
        label: 'id del centratge',
        optional: false
    }
});

Xray.attachSchema( XraySchema );
