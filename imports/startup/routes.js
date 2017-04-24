import {Router} from 'meteor/iron:router';
import '../ui/layouts/landingLayout.html';
import '../ui/layouts/mainLayout.js';
import '../ui/pages/landing/landing.js';
import '../ui/pages/rols/Rols.js';
import '../ui/pages/exemplePaginacio/exemplePaginacio.js';
import '../ui/pages/temes/temes.js';
import '../ui/pages/welcome/welcome.js';
import '../ui/pages/usuaris/usuaris.js';
import '../ui/pages/homes/professor/home.js';
import '../ui/pages/llicons/llicons.js';
import '../ui/pages/grups/grups.js';
import '../ui/pages/curs/curs.js';
import '../ui/pages/pujarRadiografies/pujar.js';
import '../ui/components/loading.html';


Router.configure({
  layoutTemplate: 'mainLayout'
});

Router.route('/', function () {
  if (this.ready()) {
    this.render('welcome');
  }
  },{
    name: 'welcome'
});

Router.route('/landing',function(){
  this.render('landing');
  this.layout('landingLayout');
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

Router.route('/curs',function(){
    this.render('curs');
});
Router.route('/grups',function(){
    this.render('grups');
});
Router.route('/temes',function(){
 this.render('temes');
});
Router.route('/llicons',function(){
 this.render('llicons');
});

Router.route('/pujar',function(){
    this.render('pujar');
});

//redirigeix l'usuari a login si no està loguejat
var requireLogin = function(){
	if(!Meteor.user()){
		if(Meteor.loggingIn()){
			Router.go('/');
			this.next();
		} else{
			Router.go('/landing');
			this.next();
		}
	}else{
		this.next();
	}
}
Router.onBeforeAction(requireLogin);
