//creat per Marc Vila i Jordi Real
import { Meteor } from 'meteor/meteor';
import {Llico} from '../../api/old/collections/llico.js';

export default function () {
  if (Llico.find({}).count() === 0) {
    Llico.insert(
      {
      llico_nom: 'Dits',
      percentatge: '40',
      tema_tema_id: '1',
      ordre_llico: '1',
      tipusllico_id: '2',
      descripcio: 'És la lliçó amb referència als dits'
      }
     );
  }
}
