Meteor.publish('artefactes', function () {
    return Artefactes.find({});
});
