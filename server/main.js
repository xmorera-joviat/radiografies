// Importació i execució de les publicacions i les seves funcions
import pubExemple from '../imports/api/exemplePaginacio/server/publicacio.js';
pubExemple();
import pubCurs from '../imports/api/curs/server/publicacio.js';
pubCurs();
//import prova from '../imports/api/tema/temaTabular.js';
//prova();


// Importacions de fitxers de mètodes
import '../imports/api/usuaris/tabularUsers.js';
import '../imports/api/exemplePaginacio/methods.js';
import '../imports/api/rols/methods.js';
import '../imports/api/grups/metodes.js';
import '../imports/api/temes/metodes.js';
import '../imports/api/curs/metodes.js';
import '../imports/api/llicons/metodes.js';
import '../imports/api/usuaris/metodes.js';



// Insercions inicials de la base de dades //
import insercions from '../imports/startup/server/index.js';
insercions();
