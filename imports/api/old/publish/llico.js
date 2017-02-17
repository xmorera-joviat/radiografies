/**
 * Created by Marc i Jordi Real on 19/1/17.
 */

Meteor.publish('llico', function () {
    return Llico.find({});
});
