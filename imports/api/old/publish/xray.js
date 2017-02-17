Meteor.publish('xray', function () {
    return Xray.find({});
});
