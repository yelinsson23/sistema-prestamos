let tablaCliente;

function getClientes(parametros = []) {

    var datos = {
        'getClientes':1,
        'parametros':parametros
    }

  $.ajax({
    type: "GET",
    url: "../ajax/agregarClientes.php",
    data: datos,
    beforeSend: function (objeto) {
      //$("#resultados").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      //$("#resultados").html(datos);
    },
  });
}

$("#tablaClientes").ready(function () {
  tablaCliente = $("#tablaClientes")
    .removeAttr("width")
    .DataTable({
      columnDefs: [
        {
          targets: [0], // Índice de la columna a ocultar (0 es la primera, 8 sería la novena)
          visible: false, // La oculta visualmente sin romper los anchos de la tabla
          searchable: false, // Opcional: evita que el buscador filtre por ese ID oculto
        },
      ],
      order: [[1, "asc"]],
      deferRender: true,
      scrollToTop: false,
      dom: "lrtip",
      columns: [
        {
          data: "id_cliente",
          className: "id-cliente",
        },
        {
          data: "nombre",
          className: "nombre",
        },
        {
          data: "apellido",
          className: "apellido",
        },
        {
          data: "documento",
          className: "documento",
        },
        {
          data: "estado_civil",
          className: "estado-civil",
        },
        {
          data: "limite_credito",
          className: "limite-credito",
        },
        {
          data: "telefono_principal",
          className: "telefono-principal",
        },
        {
          data: "nacionalidad",
          className: "nacionalidad",
        },
        {
          data: null,
          className: "action",
          defaultContent:
            "<button type='button' class='btn btn-secondary v_note'> <i class='fas fa-eye'></i></button>",
        },
      ],
    });
});
