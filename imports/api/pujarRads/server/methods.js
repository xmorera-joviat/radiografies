import fs from 'fs';
// Meteor.methods({
//   'llegirDir'(){
//     var imatges = [];
//     var radiografia;
//
//     //cerquem el path del servidor
//     var path = Npm.require('path');
//     var base = path.resolve('.');
//     base = base.split('.meteor')[0];
//
//     //retornem un array amb el contingut del directori importar
//     // return fs.readdirSync(base + 'public/radiografies/importar');
//     //////////////////////////////////////////////////// codi nou //////////////////////////////////////////////////////////////////
//     imatges = fs.readdirSync(base + 'public/radiografies/importar');
//     console.log(imatges);
//     console.log('quantitat: ' + imatges.length);
//     radiografia = imatges.shift();
//     fs.renameSync(base + 'public/radiografies/importar/' + radiografia, base + 'public/radiografies/definitives/' + radiografia);
//     return radiografia;
//   }
// });

export const methods = {
  llegirDir() {
      var imatges = [];
      var radiografia;

      //cerquem el path del servidor
      var path = Npm.require('path');
      var base = path.resolve('.');
      base = base.split('.meteor')[0];

      //retornem un array amb el contingut del directori importar
      // return fs.readdirSync(base + 'public/radiografies/importar');
      //////////////////////////////////////////////////// codi nou //////////////////////////////////////////////////////////////////
      imatges = fs.readdirSync(base + 'public/radiografies/importar');
      console.log(imatges);
      console.log('quantitat: ' + imatges.length);
      radiografia = imatges.shift();
      fs.renameSync(base + 'public/radiografies/importar/' + radiografia, base + 'public/radiografies/definitives/' + radiografia);
      return radiografia;
  }
}
Meteor.methods(methods);
