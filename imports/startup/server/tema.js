//creat per Toni Salvador i Martí Gual
import {Meteor} from 'meteor/meteor';
import {Tema} from '../../api/old/collections/tema.js';

export default function () {
  if (Tema.find({}).count() === 0) {
      Tema.insert(
          {
              nom: 'Tema 1',
              descripcio: 'descripcio tema 1',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Tema 2',
              descripcio: 'descripcio tema 2',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Tema 3',
              descripcio: 'asjdkjshflhfl afhlf',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Ortodòncia',
              descripcio: 'asd afd ea eAR ',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Implants',
              descripcio: 'E RWE WE WE ',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Elèctrodes',
              descripcio: 'AEF EF FE EFA ',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Metralla',
              descripcio: 'AE fwrr ',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Llimadures metàl·liques',
              descripcio: 'aE FEF E F',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Marcapassos',
              descripcio: 'aEF AEF aEF ',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Altres objectes hospitalaris',
              descripcio: 'AEf aeF AF E',
              usuari: 'prova'
          }
      );
      Tema.insert(
          {
              nom: 'Altres objectes personals',
              descripcio: 'AEF AEF AEF A',
              usuari: 'prova'
          }
      );
  }
};
