//creat per Toni Salvador i Martí Gual
import {Meteor} from 'meteor/meteor';
import {Temes} from '../../api/temes/temes.js';

export default function () {
  if (Temes.find({}).count() === 0) {
      Temes.insert(
          {
              nom: 'Tema 1',
              descripcio: 'descripcio tema 1',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Tema 2',
              descripcio: 'descripcio tema 2',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Tema 3',
              descripcio: 'asjdkjshflhfl afhlf',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Ortodòncia',
              descripcio: 'asd afd ea eAR ',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Implants',
              descripcio: 'E RWE WE WE ',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Elèctrodes',
              descripcio: 'AEF EF FE EFA ',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Metralla',
              descripcio: 'AE fwrr ',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Llimadures metàl·liques',
              descripcio: 'aE FEF E F',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Marcapassos',
              descripcio: 'aEF AEF aEF ',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Altres objectes hospitalaris',
              descripcio: 'AEf aeF AF E',
              usuari: 'prova'
          }
      );
      Temes.insert(
          {
              nom: 'Altres objectes personals',
              descripcio: 'AEF AEF AEF A',
              usuari: 'prova'
          }
      );
  }
};
