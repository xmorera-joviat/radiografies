/**
 * Created by Marc on 13/3/17.
 */

import { Tabular } from 'meteor/aldeed:tabular';
import { Template } from 'meteor/templating';
import moment from 'moment';
import { Meteor } from 'meteor/meteor';
import { Curs } from '../curs/curs.js';

export const Grups = new Mongo.Collection( 'grups' );

GrupsSchema = new SimpleSchema({
    'nom': {
        type: String,
        label: 'Nom',
        optional: false
    },
    'cursId': {
        type: String,
        label: 'Curs ID',
        optional: false
    },
    'tutorId': {
        type: String,
        label: 'tutor ID',
        optional: false
    }
});

new Tabular.Table({
    name: "Grups",
    collection: Grups,
    columns: [
        {data: "_id", title: "id","visible": false},
        {data: "nom", title: "Nom"},
        {data: "cursId", title: "Curs ID"},
        // {
        //   data: 'curs',
        //   title: "Curs",
        //   tmpl: Meteor.isClient && Template.cursName,
        //   tmplContext(rowData) {
        //     return {
        //       item: rowData,
        //       column: 'curs'
        //     };
        //   }
        // },
        {data: "tutorId", title: "Tutor ID"}
    ]
});
