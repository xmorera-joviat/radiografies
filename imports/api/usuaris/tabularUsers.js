 import { Tabular } from 'meteor/aldeed:tabular';
 import { Template } from 'meteor/templating';
 import moment from 'moment';
 import { Meteor } from 'meteor/meteor';
TabularTables = {};

Meteor.isClient && Template.registerHelper('TabularTables', TabularTables);

TabularTables.users = new Tabular.Table({
    name: "TemaLlistat",
    collection: Meteor.users,
    columns: [
        {data: "_id", title: "Id"},
        {data: "emails", title: "Mail"},
        {data: "profile", title: "Rol"}
    ]
});
