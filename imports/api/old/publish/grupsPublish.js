import {Meteor} from 'meteor/meteor';
import {Grups} from '../collections/grups.js';

export default function () {
  Meteor.publish('producte', function () {
    return Producte.find();
  });
};

console.log("grupsPublish");

Producte._ensureIndex('nom', {unique:1});
