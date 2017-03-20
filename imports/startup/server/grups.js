/**
 * Created by Marc on 13/3/17.
 */
import { Meteor } from 'meteor/meteor';
import {Grups} from '../../api/old/collections/grups.js';

export default function () {
    if (Grups.find({}).count() === 0) {
        Grups.insert(
            {
                nom: 'GrupA',
                cursId: '42',
                tutorId: '1'
            }
        );
        Grups.insert(
            {
                nom: 'GrupB',
                cursId: '433',
                tutorId: '12'
            }
        );
    }
}
