//Jordi Farre
import { Tabular } from 'meteor/aldeed:tabular';
import { Template } from 'meteor/templating';
import moment from 'moment';
import { Meteor } from 'meteor/meteor';
import { Llico } from '../old/collections/llico.js';

new Tabular.Table({
 name: "Llico",
 collection: Llico,
 columns: [
 {data: "_id", title: "id"},
 {data: "llico_nom", title: "Nom"},
 {data: "percentatge", title: "Percentatge"},
 {data: "tipusllico_id", title: "Tipus lliço ID"},
 {data: "descripcio", title: "Descripcio"}
 ]
});
