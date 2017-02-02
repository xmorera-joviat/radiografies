//creat per Raül López
Meteor.publish('allUsers', function () {
  if (Roles.userIsInRole(this.userId, ['admin', 'professor'])) {
    return Meteor.users.find();
  }
  return null;
});
