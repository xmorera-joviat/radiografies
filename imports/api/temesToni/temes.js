import { Tabular } from 'meteor/aldeed:tabular';
import { Template } from 'meteor/templating';
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
 {data: "usuari", title: "Usuari"}
 ]
});
