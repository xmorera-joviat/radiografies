import '../ui/layouts/baseLayout.js';
import '../ui/pages/rols/Rols.js';
import '../ui/pages/exemplePaginacio/exemplePaginacio.js';
//import '../ui/pages/temes/temaLlistat.js';
import '../ui/pages/temesToni/temes.js';



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
/*
Router.route('/tema',function(){
    this.render('tema');
});
*/
Router.route('/llistatUsuaris',function(){
    this.render('llistatUsers');
});
Router.route('/grups',function(){
    this.render('grups');
});
Router.route('/temes',function(){
 this.render('temes');
});
