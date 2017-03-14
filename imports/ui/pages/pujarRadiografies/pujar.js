Template.pujar.events({
  "click #test": function(){
    Meteor.call('llegirDir',function(error,data){
        if (error){
          console.log(error);
        }
        Session.set("imatges", data);

    });
  }
});
Template.pujar.helpers({
  // imatges: function(){
  //   var temp = Meteor.call('llegirDir',function(error,data){
  //     if (error){
  //       console.log(error);
  //     }
  //     return data;
  //   });
  //   console.log(temp);
  //   return temp;
  // }
  imatges: function(){
     return Template.instance().data2;
  },
  imatges2: function(){
     var imatges = Session.get('imatges');
     return imatges;
  },

});
Template.pujar.onCreated(function(){
console.log('ping!' + new Date);
});
