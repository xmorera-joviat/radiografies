// Creat per Aitor G. Vall
Meteor.publish('grupsItem', function () {
    return Grups.find({});
});
