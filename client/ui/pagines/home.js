Meteor.subscribe('posicions');
TabularTables = {};

Meteor.isClient && Template.registerHelper('TabularTables', TabularTables);

TabularTables.Posicions = new Tabular.Table({
  name: "Posicions",
  collection: Posicions,
  columns: [
    {data: "id", title: "Id"},
    {data: "zona", title: "Zona"},
    {data: "os", title: "Os"},
    {data: "posicio", title: "Posicion"},
    {data: "centratge", title: "Centratge"},
    {
      tmpl: Meteor.isClient && Template.PosicionsActionBtns, class: "col-md-1"
    }
  ]
});
