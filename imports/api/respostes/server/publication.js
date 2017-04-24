import {Meteor} from 'meteor/meteor';
import {Respostes} from '../respostes.js';

export default function () {
  Meteor.publish('respostes', function () {
      return Respostes.find({});
  });
};
