Router.configure({
  layoutTemplate: 'baseLayout'
});

Router.route('/',function(){
  this.render('welcome');
});
Router.route('/home',function(){
  this.render('home');
});
Router.route('/test',function(){
  this.render('test');
});
Router.route('/users',function(){
  this.render('users');
});
Router.route('/tema',function(){
    this.render('tema');
});