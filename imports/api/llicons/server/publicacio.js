/**
 * Created by Toni Salvador i Martí Gual on 19/1/17.
 */

import {Meteor} from 'meteor/meteor';
import {Llicons} from '../llicons.js';

export default function () {
  Meteor.publish('llicons', function () {
      return Llicons.find({});
  });
};



