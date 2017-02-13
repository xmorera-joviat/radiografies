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
Router.route('/rols',function(){
  this.render('rols');
});
Router.route('/tema',function(){
    this.render('tema');
});
Router.route('/llistatUsuaris',function(){
    this.render('llistatUsers');
});
