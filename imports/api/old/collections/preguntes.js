Preguntes = new Mongo.Collection( 'preguntes' );
//Kike i Jordi
PreguntesSchema = new SimpleSchema({
    'enunciat': {
        type: String,
        label: 'Enunciat de la pregunta',
		min: 11,
        optional: false
    },
    'percentatge': {
        type: Number,
        label: 'Percentatge',
		min: 11,
        optional: true
    },
	'llicoId': {
        type: Number,
        label: 'Lliço',
		min: 11,
        optional: false
    },
	'ordrePregunta': {
        type: Number,
        label: 'Ordre de les preguntes',
		min: 11,
        optional: true
    },
	'xrayCodi': {
        type: Number,
        label: 'Radiografia',
		min: 10,
        optional: false
    }
});

Preguntes.attachSchema( PreguntesSchema );
