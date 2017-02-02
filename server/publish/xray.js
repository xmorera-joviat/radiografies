//creat per Raül López
Meteor.publish('xray', function () {
    return Xray.find({});
});
