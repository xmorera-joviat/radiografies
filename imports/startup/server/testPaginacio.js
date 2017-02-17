//created by Raül López
import {Meteor} from 'meteor/meteor';
import {Test} from '../../api/exemplePaginacio/exemplePaginacio.js';

export default function () {
  if (Test.find({}).count() < 10) {
      Test.remove({});
      Test.insert({'zona':'EEII - Peus','os':'Dits del peu','posicio':'Obliqua','centratge':'Falange proximal'});
      Test.insert({'zona':'EEII - Peus','os':'Peus','posicio':'AP','centratge':'Meitat del tercer metatarsià'});
      Test.insert({'zona':'EEII - Peus','os':'Peus','posicio':'Perfil','centratge':'Meitat del peu'});
      Test.insert({'zona':'EEII - Peus','os':'Peus','posicio':'Obliqua interna','centratge':'Meitat del tercer metatarsià'});
      Test.insert({'zona':'EEII - Cama inferior','os':'Tibia i peroné','posicio':'AP','centratge':'Diàfisi tibial'});
      Test.insert({'zona':'EEII - Cama inferior','os':'Tibia i peroné','posicio':'Lateral','centratge':'Diàfisi tibial'});
      Test.insert({'zona':'EEII - Cama inferior','os':'Tibia i peroné','posicio':'Obliqua externa','centratge':'Diàfisi tibial'});
      Test.insert({'zona':'EEII - Cama inferior','os':'Tibia i peroné','posicio':'Obliqua interna','centratge':'Diàfisi tibial'});
      Test.insert({'zona':'EEII - Genoll','os':'Genoll','posicio':'AP','centratge':'Pol inferior ròtula'});
      Test.insert({'zona':'EEII - Genoll','os':'Genoll','posicio':'Perfil','centratge':'Pol inferior ròtula'});
  }
};
