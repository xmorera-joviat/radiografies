// Creat per Aitor G. Vall
Meteor.publish('grups', function () {
    return Grups.find({});
});
