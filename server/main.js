// Importació i execució de les publicacions i les seves funcions
import pubExemple from '../imports/api/exemplePaginacio/server/publicacio.js';
pubExemple();
import usuaris from '../imports/api/usuaris/server/publicacio.js';
usuaris();
import cursos from '../imports/api/curs/server/publicacio.js';
cursos();
import grups from '../imports/api/grups/server/publicacio.js';
grups();
import llicons from '../imports/api/llicons/server/publicacio.js';
llicons();
import temes from '../imports/api/temes/server/publicacio.js';
temes();

// Importacions de fitxers de mètodes
import '../imports/api/usuaris/tabularUsers.js';
import '../imports/api/exemplePaginacio/methods.js';
import '../imports/api/rols/methods.js';
import '../imports/api/grups/metodes.js';
import '../imports/api/temes/metodes.js';
import '../imports/api/curs/metodes.js';
import '../imports/api/llicons/metodes.js';
import '../imports/api/usuaris/metodes.js';
import '../imports/api/pujarRads/methods.js';


// Insercions inicials de la base de dades //
import insercions from '../imports/startup/server/index.js';
insercions();
