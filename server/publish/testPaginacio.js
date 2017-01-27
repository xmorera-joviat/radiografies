Meteor.publish('test', function () {
    return Test.find({});
});
Meteor.publish(null, function (){
  return Meteor.roles.find({})
})
