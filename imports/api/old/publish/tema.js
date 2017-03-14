/**
 * Created by Toni Salvador i Martí Gual on 19/1/17.
 */

Meteor.publish('tema', function () {
    return Tema.find({});
});