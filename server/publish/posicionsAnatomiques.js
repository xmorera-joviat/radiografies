//creat per Raül López
Meteor.publish('posicions', function () {
    return Posicions.find({});
});
