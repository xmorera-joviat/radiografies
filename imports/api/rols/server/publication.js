// creat per Raül López
// Més exemples ...
import {Meteor} from 'meteor/meteor';
import {Rols} from 'meteor/alanning:roles';

export default function () {
  Meteor.publish('rols', function () {
    if(!this.userId){
      return this.ready();
    }
    return Rols.find({});
  });
};
