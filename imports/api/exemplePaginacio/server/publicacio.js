// creat per Raül López
// Més exemples ...

import {Meteor} from 'meteor/meteor';
import {Test} from '../exemplePaginacio.js';

export default function () {
  Meteor.publish('test', function () {
      return Test.find({});
  });
};
