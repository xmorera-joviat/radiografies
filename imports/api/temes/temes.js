import { Tabular } from 'meteor/aldeed:tabular';
import { Template } from 'meteor/templating';
<<<<<<< HEAD
import moment from 'moment';
import { Meteor } from 'meteor/meteor';
import { Tema } from '../old/collections/tema.js';
TabularTables = {};

Meteor.isClient && Template.registerHelper('TabularTables', TabularTables);

TabularTables.Tema = new Tabular.Table({
	name: "Tema",
	collection: Tema,
	columns: [
 		{data: "_id", title: "id"},
 		{data: "nom", title: "Nom"},
 		{data: "descripcio", title: "Descripcio"},
 		{data: "usuari", title: "idUsuari"},
 		{title:"Usuari",mpl: Meteor.isClient && Template.usuariNom,
		tmplContext(usuariNom) {
			    return {
			      item: usuariNom,
			      column: 'title:aixonofuncioina'
			    };
		}
	 	}
 	]	
});
=======
import { Meteor } from 'meteor/meteor';
import moment from 'moment';

export const Temes = new Mongo.Collection( 'temes' );

export const TemaSchema = new SimpleSchema({
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
                return {
                    $setOnInsert: new Date()
                };
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
                return {
                    $setOnInsert: moment(new Date()).format('LLL')
                };
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


new Tabular.Table({
   name: "Temes",
   collection: Temes,
   columns: [
   {data: "_id", title: "id"},
   {data: "nom", title: "Nom"},
   {data: "descripcio", title: "Descripcio"},
   {data: "usuari", title: "Usuari"}
   ]
});
>>>>>>> master
