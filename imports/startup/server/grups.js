//Creat per Marc Vila i Jordi Real
import { Meteor } from 'meteor/meteor';
import { Grups } from '../../api/old/collections/grups.js';

export default function () {
  if (Grups.find({}).count() === 0) {
    Grups.insert(
      {
      nom: 'Dits',
      cursId: '40',
      tutorId: '1'
      }
     );
  }
}
