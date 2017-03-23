/**
 * Created by Toni Salvador i Martí Gual on 19/1/17.
 */

import {Meteor} from 'meteor/meteor';
import {Tema} from '../temes.js';

export default function () {
  Meteor.publish('temes', function () {
      return Temes.find({});
  });
};