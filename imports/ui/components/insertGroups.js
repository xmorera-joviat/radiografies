import './insertGroups.html';
import { Grups } from '../../api/old/collections/grups.js';

Template.insertGroups.events({
  "submit form": function(event, template){
    event.preventDefault();
    var nom         = $('input[name="nom"]').val();
    console.log("insertGroups.js");
  }
});
