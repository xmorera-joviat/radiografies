Meteor.publish('posicions', function () {
    return Posicions.find({});
});
