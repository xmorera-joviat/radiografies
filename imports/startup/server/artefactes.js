//creat per Raül López
import { Meteor } from 'meteor/meteor';
import {Artefactes} from '../../api/old/collections/artefactes.js';

export default function () {
  if (Artefactes.find({}).count() === 0) {
    Artefactes.insert(
      {
      nom: 'Pírcings',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Arracades',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Pròtesis',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Ortodòncia',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Implants',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Elèctrodes',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Metralla',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Llimadures metàl·liques',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Marcapassos',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Altres objectes hospitalaris',
      descripcio: ''
      }
    );
    Artefactes.insert(
      {
      nom: 'Altres objectes personals',
      descripcio: ''
      }
    );
  }
};
