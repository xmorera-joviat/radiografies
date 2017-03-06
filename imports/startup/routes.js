import '../ui/layouts/baseLayout.js';
import '../ui/pages/rols/Rols.js';
import '../ui/pages/exemplePaginacio/exemplePaginacio.js';
import '../ui/pages/temes/temes.js';
import '../ui/pages/usuaris/usuaris.js';
import {Router} from 'meteor/iron:router';



Router.route('/temes',function(){
 this.render('temes');
});

Router.configure({
  layoutTemplate: 'baseLayout'
});
Router.route('/',function(){
  this.render('welcome');
});
Router.route('/home',function(){
  this.render('home');
});

Router.route('/usuaris',function(){
 this.render('usuaris');
});
Router.route('/exemplePaginacio',function(){
  this.render('exemplePaginacio');
});
Router.route('/rols',function(){
  this.render('rols');
});
Router.route('/tema',function(){
    this.render('tema');
});
Router.route('/grups',function(){
    this.render('grups');
});
