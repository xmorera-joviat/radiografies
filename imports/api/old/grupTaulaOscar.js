/**
 * Created by Oscar
 */
TabularTables = {};

Meteor.isClient && Template.registerHelper('TabularTables', TabularTables);

TabularTables.Tema = new Tabular.Table({
    name: "Grups",
    collection: Grups,
    columns: [
        {data: "nom", title: "Nom"},
        {data: "cursId", title: "Curs ID"},
        {data: "tutorId", title: "Tutor ID"},
        {
            tmpl: Meteor.isClient && Template.temaActionBtns, class: "col-md-1"
        }
    ]
});