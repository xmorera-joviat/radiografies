/**
 * Created by Toni Salvador i Martí Gual on 19/1/17.
 */

import {Meteor} from 'meteor/meteor';
import {Tema} from '../grups.js';

export default function () {
  Meteor.publish('grup', function () {
      return Grup.find({});
  });
};



