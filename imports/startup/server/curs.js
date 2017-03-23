/**
 * Created by Marc on 13/3/17.
 */
import { Meteor } from 'meteor/meteor';
import {Curs} from '../../api/curs/curs.js';

export default function () {
    if (Curs.find({}).count() === 0) {
        Curs.insert(
            {
                nom: 'Curs1',
            }
        );
        Curs.insert(
            {
                nom: 'Curs2',
            }
        );
    }
}
