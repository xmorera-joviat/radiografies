import { Meteor } from 'meteor/meteor';

if (Posicions.find({}).count() === 0) {
        Posicions.insert(
          {
          'zona': "EEII - Peus",
          'os': "Dits del peu",
          'posicio': "AP",
          'centratge': "Falange proximal"
          }
        );
        Posicions.insert(
          {
          'zona': "EEII - Peus",
          'os': "Dits del peu",
          'posicio': "Obliqua",
          'centratge': "Falange proximal"
          }
        );
        Posicions.insert(
          {
          'zona': "EEII - Peus",
          'os': "Peus",
          'posicio': "AP",
          'centratge': "Meitat del tercer metatarsià"
          }
        );
        Posicions.insert(
          {
          'zona': "EEII - Peus",
          'os': "Peus",
          'posicio': "Perfil",
          'centratge': "Meitat del peu"
          }
        );
        Posicions.insert(
          {
          'zona': "EEII - Peus",
          'os': "Peus",
          'posicio': "Obliqua interna",
          'centratge': "Meitat del tercer metatarsià"
          }
        );
        Posicions.insert(
          {
          'zona': "EEII - Peus",
          'os': "Peus en càrrega",
          'posicio': "AP",
          'centratge': "Meitat dels dos peus"
          }
        );
        Posicions.insert(
          {
          'zona': "EEII - Cama inferior",
          'os': "Tibia i peroné",
          'posicio': "AP",
          'centratge': "Diàfisi tibial"
          }
        );
        Posicions.insert(
          {
          'zona': "EEII - Cama inferior",
          'os': "Tibia i peroné",
          'posicio': "Lateral",
          'centratge': "Diàfisi tibial"
          }
        );
}
