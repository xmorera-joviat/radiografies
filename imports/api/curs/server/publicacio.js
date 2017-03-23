/**
 * Created by Toni Salvador i Martí Gual on 19/1/17.
 */

import {Meteor} from 'meteor/meteor';
import {Tema} from '../curs.js';

export default function () {
  Meteor.publish('curs', function () {
      return Curs.find({});
  });
};