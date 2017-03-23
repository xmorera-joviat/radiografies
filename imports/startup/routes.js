import '../ui/layouts/baseLayout.js';
import '../ui/pages/rols/Rols.js';
import '../ui/pages/exemplePaginacio/exemplePaginacio.js';
import '../ui/pages/temes/temes.js';


Router.configure({
  layoutTemplate: 'baseLayout'
});

Router.route('/',function(){
  this.render('welcome');
});
Router.route('/home',function(){
  this.render('home');
});
Router.route('/exemplePaginacio',function(){
  this.render('exemplePaginacio');
});
Router.route('/rols',function(){
  this.render('rols');
});
Router.route('/temes',function(){
 this.render('temes');
});
Router.route('/llistatUsuaris',function(){
    this.render('llistatUsers');
});
Router.route('/grups',function(){
    this.render('grups');
});
