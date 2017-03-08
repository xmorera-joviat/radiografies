//By Oscar Ruiz
import { Tabular } from 'meteor/aldeed:tabular';
import { Template } from 'meteor/templating';
import moment from 'moment';
import { Meteor } from 'meteor/meteor';
import { Grups } from '../old/collections/grups';

TabularTables = {};

Meteor.isClient && Template.registerHelper('TabularTables', TabularTables);

TabularTables.Tema = new Tabular.Table({
    name: "Grups",
    collection: Grups,
    columns: [
        {data: "nom", title: "nom"},
        {data: "cursId", title: "cursId"},
        {data: "tutorId", title: "tutorId"}
    ]
});