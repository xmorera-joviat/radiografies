if(Meteor.users.find().count() == 0){
  var users = [
        {name:"Usuari professor",email:"professor@joviat.com",roles:['professor']},
        {name:"Usuari alumne",email:"alumne@joviat.com",roles:['alumne']},
        {name:"Usuari administrador",email:"admin@joviat.com",roles:['admin']},
        {name:"Usuari convidat",email:"convidat@joviat.com",roles:['']},
  ];

  _.each(users, function (user) {
    var id;

    id = Accounts.createUser({
      email: user.email,
      password: "123456",
      profile: { name: user.name }
    });

    if (user.roles.length > 0) {
      Roles.addUsersToRoles(id, user.roles);
    };

  });
};
