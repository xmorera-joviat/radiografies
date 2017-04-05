import {Meteor} from 'meteor/meteor';
import {Roles} from 'meteor/alanning:roles';
import { _ } from 'meteor/underscore';

export default function () {
  if(Meteor.users.find().count() == 0){
    var users = [
          {name:"Usuari professor",email:"professor@joviat.com",roles:['professor']},
          {name:"Usuari alumne",email:"alumne@joviat.com",roles:['alumne']},
          {name:"Usuari administrador",email:"admin@joviat.com",roles:['admin']},
          {name:"Jordi Farré",email:"farre@joviat.com",roles:['alumne']},
          {name:"Sergey Musyus",email:"sergey@joviat.com",roles:['alumne']},
          {name:"Raul Lopez",email:"raul@joviat.com",roles:['alumne']},
          {name:"Filipao Vasilesao",email:"filipao@joviat.com",roles:['alumne']},
          {name:"Enric Gonzalez",email:"kike@joviat.com",roles:['alumne']},
          {name:"Usuari convidat",email:"convidat@joviat.com",roles:['']},
    ];

    _.each(users, function (user) {
      var id;

      id = Accounts.createUser({
        email: user.email,
        password: "123456",
        profile: { name: user.name }
      });
      console.log(id);
      if (user.roles.length > 0) {
        Roles.addUsersToRoles(id, user.roles);
      };

    });
  };
};
