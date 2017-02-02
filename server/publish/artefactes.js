//creat per Raül López
Meteor.publish('artefactes', function () {
    return Artefactes.find({});
});
