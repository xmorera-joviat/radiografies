import {Meteor} from 'meteor/meteor';
import './pujar.html';
import {noUiSlider} from 'meteor/rcy:nouislider';


Template.pujar.onCreated(function(){
    // Meteor.call('llegirDir',function(error,response){
    //     if (error){
    //       console.log(error);
    //     }
    //     Session.set("imatges", response);
    // });
})

Template.pujar.onRendered(function(){
  $('#image2-container').hide();
  $("#mainimage").elevateZoom({
    zoomType: "lens",
    lensShape: "round",
    lensSize: 300,
    scrollZoom: false
  });

  // this.$('.slider').noUiSlider({
  //     start: 40,
  //     connect: "lower",
  //     step: 1,
  //     format: wNumb({
  //       decimals: 0,
  //     }),
  //     range: {
  //       'min': 40,
  //       'max': 125
  //     }
  //   });
  // this.$('.slider').Link('lower').to(this.$('.range'));
  this.$('#slide1').noUiSlider({
      start: 40,
      connect: "lower",
      step: 1,
      format: wNumb({
        decimals: 0,
      }),
      range: {
        'min': 40,
        'max': 125
      }
    });
  this.$('#slide1').Link('lower').to(this.$('#slide1Text'));

  this.$('#slide2').noUiSlider({
      start: 1.2,
      connect: "lower",
      step: 0.1,
      format: wNumb({
        decimals: 1,
      }),
      range: {
        'min': 1.2,
        'max': 160
      }
    });
  this.$('#slide2').Link('lower').to(this.$('#slide2Text'));

  this.$('#slide3').noUiSlider({
      start: 1,
      connect: "lower",
      step: 0.1,
      format: wNumb({
        decimals: 1,
      }),
      range: {
        'min': 1,
        'max': 2
      }
    });
  this.$('#slide3').Link('lower').to(this.$('#slide3Text'));

});
Template.pujar.events({
  "click #test": function(event,template){
    Meteor.call('llegirDir',function(error,data){
      if(data){
         Session.set('radiografia',data);
      }
    });
  },
  'click #camleft, click #camcent, click #camright': function(e,t){
    if ($(this).prop("checked")){
      console.log('si');
    }else {
      console.log('no');
    }
  },
  'click #image-wrapper':function(){
    $('#image1-container, #image2-container').toggle();
  }
});
Template.pujar.helpers({
  radiografia: function(){
    return Meteor.userId() + '.jpg';
  },
  slider: function () {
    return Session.get("slider");
  },
  imatges: function(){
     return Template.instance().data2;
  },
  imatges2: function(){
     var imatges = Session.get('imatges');
     return imatges;
  },

});
