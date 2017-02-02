//creat per Toni Salvador.
Tema = new Mongo.Collection( 'tema' );
import moment from 'moment';

TemaSchema = new SimpleSchema({
    'nom': {
        type: String,
        label: 'Nom',
        optional: false
    },
    'usuari': {
        type: String,
        label: 'Usuari',
        optional: false,
        autoValue: function () {
            return this.userId;
        }
    },
    'dataCreacio': {
        type: String,
        label: 'Data de creacio',
        optional: false,
        autoValue: function() {
            if (this.isInsert) {
                return moment(new Date()).format('LLL');
            } else if (this.isUpsert) {
                return {$setOnInsert: new Date()};
            } else {
                this.unset();
            }
        }
    },
    'dataEdicio': {
        type: String,
        label: 'Data d\'edicio',
        optional: true,
        autoValue: function() {
            if (this.isUpsert) {
                return {$setOnInsert: moment(new Date()).format('LLL')};
            } else {
                this.unset();
            }
        }
    },
    'descripcio': {
        type: String,
        label: 'Descripcio',
        optional: true
    }
});

Tema.attachSchema( TemaSchema );
