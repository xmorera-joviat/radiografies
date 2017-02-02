//creat per Raül López
Meteor.publish('rols', function () {
    return Rols.find({});
});
