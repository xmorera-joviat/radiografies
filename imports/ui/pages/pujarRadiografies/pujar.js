import {Meteor} from 'meteor/meteor';
import './pujar.html';
import {noUiSlider} from 'meteor/rcy:nouislider';
import { Radiografies } from '../../../api/radiografies/radiografies.js';
import { editarRadiografia } from '../../../api/radiografies/methods.js';
import { insertRespostes } from '../../../api/respostes/methods.js';

Template.pujar.onCreated(function(){
  var subscription;
  this.autorun(()=>{
    subscription = this.subscribe('radiografies');
    this.subscribe('respostes');
    if (subscription.ready()) {
      this.autorun(function(c){
        if(c.firstRun){
            rad = Radiografies.findOne({status:0});
            Session.set('rad',rad);
              if(rad){
                editarRadiografia.call({
                  id: rad._id,
                  ext: rad.ext,
                  status: 1
                }, (err,res) => {
                  if (err) {
                    console.log(err);
                  } else {
                    console.log('Registre editat correctament');
                  }
                });
              }
            }
        });
      }
  });
});

Template.pujar.onRendered(function(){

  $('#image2-container').hide();
  $("#mainimage").elevateZoom({
    zoomType: "lens",
    lensShape: "round",
    lensSize: 300,
    scrollZoom: false
  });

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

  'click #image-wrapper':function(){
    $('#image1-container, #image2-container').toggle();
  },
  'submit form': function (event, template) {
    event.preventDefault();


    if(template.find('input:radio[name=focus]:checked')){
      var focus = template.find('input:radio[name=focus]:checked').value;
    }else{
      var focus = null;
    }

    if (template.find('input:checkbox[name=camleft]:checked')){
      var camLeft = 'si';
    } else {
      var camLeft = 'no';
    }

    if (template.find('input:checkbox[name=camcent]:checked')){
      var camCent = 'si';
    } else {
      var camCent = 'no';
    }

    if (template.find('input:checkbox[name=camright]:checked')){
      var camRight = 'si';
    } else {
      var camRight = 'no';
    }

    if(template.find('input:radio[name=bucky]:checked')){
      var bucky = template.find('input:radio[name=bucky]:checked').value;
    }else{
      var bucky = null;
    }

    if(template.find('input:radio[name=xassis]:checked')){
      var xassis = template.find('input:radio[name=xassis]:checked').value;
    }else{
      var xassis = null;
    }

    var kw = $('#slide1Text').html();
    var mas = $('#slide2Text').html();
    var dfo = $('#slide3Text').html();

    var rad = Session.get('rad');
    var img = rad._id + rad.ext;
    var observacions = $('#textarea').val();
    var uploader = Meteor.userId();
    var validador = null;
    var validada = false;

    insertRespostes.call({
      focus:focus,
      camLeft:camLeft,
      camCent:camCent,
      camRight:camRight,
      bucky:bucky,
      xassis:xassis,
      kw:kw,
      mas:mas,
      dfo:dfo,
      img:img,
      observacions:observacions,
      uploader:uploader,
      validador:validador,
      validada:validada
    }, (err,res) => {
      if (err) {
        alert(err);
      } else {
        editarRadiografia.call({
          id: rad._id,
          ext: rad.ext,
          status: 2
        }, (err,res) => {
          if (err) {
            console.log(err);
          } else {
            console.log('Radiografia inserida correctament');
            template.find("form").reset();
            $('#slide1Text').html(40);
          }
        });
      }
    });

  }
});
Template.pujar.helpers({
  radiografia: function(){
    let rad = Session.get('rad');
    let nomfitxer = rad._id + rad.ext;
    return (nomfitxer) ? nomfitxer : 'loading.jpg';

  },
  slider: function () {
    return Session.get("slider");
  }

});
