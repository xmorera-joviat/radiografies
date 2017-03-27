import {Meteor} from 'meteor/meteor';

export default function () {
  Meteor.publish('usuaris', function () {
    if(!this.userId){
      return this.ready();
    }
    return Meteor.users.find({});
  });
};
