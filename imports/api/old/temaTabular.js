/**
 * Created by Toni Salvador i Martí Gual
 */
TabularTables = {};

Meteor.isClient && Template.registerHelper('TabularTables', TabularTables);

TabularTables.Tema = new Tabular.Table({
    name: "TemaLlistat",
    collection: Tema,
    columns: [
        {data: "_id", title: "Id"},
        {data: "nom", title: "Nom"},
        {data: "dataCreacio", title: "Data Creació"},
        {data: "usuari", title: "Usuari"},
        {data: "descripcio", title: "Descripció"},
        {
            tmpl: Meteor.isClient && Template.temaActionBtns, class: "col-md-1"

        }
    ]
});






























