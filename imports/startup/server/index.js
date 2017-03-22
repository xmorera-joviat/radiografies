import {Meteor} from 'meteor/meteor';
import usuaris from './usuaris.js';
import testPaginacio from './testPaginacio.js';
import temes from './temes.js';
import posicionsAnatomiques from './posicionsAnatomiques.js';
import llico from './llico.js';
import artefactes from './artefactes.js';
import grups from './grups.js';

export default function () {
  usuaris();
  testPaginacio();
  temes();
  posicionsAnatomiques();
  llico();
  artefactes();
  grups();
};
