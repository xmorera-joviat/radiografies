import {Meteor} from 'meteor/meteor';
import {Radiografies} from '../radiografies.js';

export default function () {
  Meteor.publish('radiografies', function () {
      return Radiografies.find({});
  });
};
