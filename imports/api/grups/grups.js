/**
 * Created by Marc on 13/3/17.
 */

import { Tabular } from 'meteor/aldeed:tabular';
import { Template } from 'meteor/templating';
import moment from 'moment';
import { Meteor } from 'meteor/meteor';
import { Grups } from '../old/collections/grups.js';

new Tabular.Table({
    name: "Grups",
    collection: Grups,
    columns: [
        {data: "_id", title: "id"},
        {data: "nom", title: "Nom"},
        {data: "cursId", title: "Curs ID"},
        {data: "tutorId", title: "Tutor ID"}
    ]
});