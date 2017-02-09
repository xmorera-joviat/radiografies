/**
 * Created by mgblinux on 09/02/17.
 */
TabularTables = {};

Meteor.isClient && Template.registerHelper('TabularTables', TabularTables);

TabularTables.Posicions = new Tabular.Table({
    name: "posicionsAnatomiques",
    collection: Posicions,
    columns: [
        {data: "_id", title: "Id"},
        {data: "zona", title: "Zona"},
        {data: "os", title: "Os"},
        {data: "posicio", title: "Posicion"},
        {data: "centratge", title: "Centratge"},
        {
            tmpl: Meteor.isClient && Template.PosicionsActionBtns, class: "col-md-1"
        }
    ]
});