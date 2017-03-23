import { Tabular } from 'meteor/aldeed:tabular';
import { Template } from 'meteor/templating';
import { Meteor } from 'meteor/meteor';
import moment from 'moment';

export const Curs = new Mongo.Collection( 'curs' );

export const CursSchema = new SimpleSchema({
    'id': {
		type: String,
		optional: true
    },	
	'nom': {
        type: String,
        label: 'Nom',
        optional: false
    },
    'created_by': {
        type: String,
        label: 'Usuari',
        optional: false,
        autoValue: function () {
            return this.userId;
        }
    },
    'descripcio': {
        type: String,
        label: 'Descripcio',
        optional: true
    }
});

new Tabular.Table({
   name: "Curs",
   collection: Curs,
   columns: [
   {data: "_id", title: "id"},
   {data: "nom", title: "Nom"},
   {data: "descripcio", title: "Descripcio"},
   {data: "usuari", title: "Usuari"}
   ]
});
