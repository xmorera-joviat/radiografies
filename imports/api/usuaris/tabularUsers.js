 import { Tabular } from 'meteor/aldeed:tabular';
 import { Template } from 'meteor/templating';
 import moment from 'moment';
 import { Meteor } from 'meteor/meteor';

new Tabular.Table({
    name: "users",
    collection: Meteor.users,
    columns: [
        {data: "_id", title: "Id", "visible": false},
        {data: "emails[0].address", title: "Mail"},
        {data: "profile.name", title: "Nom"}
    ]
});
