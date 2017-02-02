Template.nomTemplate.helpers({
// args: objects, Dictionary of helper functions by name.
// Each template has a local dictionary of helpers that are made available to it, and this call specifies helpers to add to the
// template’s dictionary.
// });





});
Template.nomTemplate.events({
  // args: event map, Event handlers to associate with this template.
  // Declare event handlers for instances of this template. Multiple calls add new event handlers in addition to the existing ones.
  // Ex: Fires when 'accept' is clicked or focused, or a key is pressed
  // 'click .accept, focus .accept, keypress'(event) { ... }





});

Template.nomTemplate.onCreated(function () {
// args: functions
// Callbacks added with this method are called before your template’s logic is evaluated for the first time. Inside a callback,
// this is the new template instance object. Properties you set on this object will be visible from the callbacks added with
// onRendered and onDestroyed methods and from event handlers.




});

Template.nomTemplate.onRendered(function () {
// args: functions, A function to be added as a callback.
// Callbacks added with this method are called once when an instance of Template.myTemplate is rendered into DOM nodes and
// put into the document for the first time.




});
Template.nomTemplate.onDestroyed(function () {
// args: functions, A function to be added as a callback.
// These callbacks are called when an occurrence of a template is taken off the page for any reason and not replaced with a re-rendering.
// Inside a callback, this is the template instance object being destroyed.
// This group of callbacks is most useful for cleaning up or undoing any external effects of created or rendered groups. This group fires
// once and is the last callback to fire.




});
