 import { Tabular } from 'meteor/aldeed:tabular';
 import { Template } from 'meteor/templating';
 import moment from 'moment';
 import { Meteor } from 'meteor/meteor';

Tabular.Table({
    name: "TemaLlistat",
    collection: Meteor.users,
    columns: [
        {data: "_id", title: "Id"},
        {data: "emails[0].address", title: "Mail"},
        {data: "profile.name", title: "Rol/Nom"}
    ]
});
