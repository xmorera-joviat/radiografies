import { _ } from 'meteor/underscore';

function distinct(collection, field) {
  return _.uniq(collection.find({}, {
    sort: {[field]: 1}, fields: {[field]: 1}
  }).map(x => x[field]), true);
};
Template.home.onCreated(function(){
  this.autorun(()=>{
    Meteor.subscribe('posicions');
    Meteor.subscribe('artefactes');
    //podem fer this pq fem servir una arrow function sinó hauriem
    //de fer that i declarar un var that = this fora de l'autorun.
  });
});
Template.home.helpers({
  recordset: function() {
    var temp2 =  Posicions.find();
    return temp2
  },
  zones: function() {
    var zonesQuery = distinct(Posicions, 'zona');
    return zonesQuery;
  },
  ossos: function() {
    var zone = Session.get("zona");
    var myArray = Posicions.find({zona:zone}).fetch();
    var distinctArray = _.uniq(myArray, false, function(d) {return d.os});
    var disctinctValues = _.pluck(distinctArray, 'os');
    return disctinctValues;
  },
  positions: function() {
    var bone = Session.get("os");
    var myArray2 = Posicions.find({os:bone}).fetch();
    var distinctArray2 = _.uniq(myArray2, false, function(d) {return d.posicio});
    var disctinctValues2 = _.pluck(distinctArray2, 'posicio');
    return disctinctValues2;
  },
  centratges: function() {
    var bone = Session.get("os");
    var pos = Session.get("posicio");
    var myArray3 = Posicions.find({os:bone,posicio:pos}).fetch();
    var distinctArray3 = _.uniq(myArray3, false, function(d) {return d.centratge});
    var disctinctValues3 = _.pluck(distinctArray3, 'centratge');
    return disctinctValues3;
  }
});
Template.home.events({
  'change #zona': function(evt){
    Session.set("zona", $("#zona").val());
    $('#os').prop('selectedIndex', 0);
    $('#posicio').prop('selectedIndex', 0);
    $('#centratge').prop('selectedIndex', 0);
  },
  'change #os': function(evt){
    Session.set("os", $("#os").val());
    $('#posicio').prop('selectedIndex', 0);
    $('#centratge').prop('selectedIndex', 0);
  },
  'change #posicio': function(evt){
    Session.set("posicio", $("#posicio").val());
    $('#centratge').prop('selectedIndex', 0);
  }

});
