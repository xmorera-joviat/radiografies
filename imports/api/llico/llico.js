import { Tabular } from 'meteor/aldeed:tabular';
import { Template } from 'meteor/templating';
import moment from 'moment';
import { Meteor } from 'meteor/meteor';
import { Llico } from '../old/collections/llico.js';
TabularTables = {};
Meteor.isClient && Template.registerHelper('TabularTables', TabularTables);
TabularTables.Llico = new Tabular.Table({
 name: "Llico",
 collection: Llico,
 columns: [
 {data: "llico_nom", title: "Nom"},
 {data: "percentatge", title: "Percentatge"},
 {data: "tema_tema_id", title: "Tema ID"},
 {data: "ordre_llico", title: "Ordre llico"},
 {data: "tipusllico_id", title: "Tipus llico ID"},
 {data: "descripcio", title: "Descripcio"}
 ]
});
