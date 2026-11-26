var tablaCliente;

function getClientes() {
  parametros = {
    input: $("#filtroGeneral").val(),
    estado_civil: $("#filtroEstadoCivil").val(),
    nacionalidad: $("#filtroNacionalidad").val(),
    garante: $("#filtroClienteGarante").val(),
    estado: $("#filtroEstado").val(),
    rangoMin: $("#rangoMin").val(),
    rangoMax: $("#rangoMax").val(),
  };
  var datos = {
    getClientes: 1,
    parametros: parametros,
  };

  $.ajax({
    type: "GET",
    url: "../ajax/Clientes.php",
    data: datos,
    beforeSend: function (objeto) {
      //$("#resultados").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      tablaCliente.clear().draw();
      result = JSON.parse(datos);
      console.log(result);
      if(result.data!=null){
      tablaCliente.rows.add(result.data).draw();

      }
    },
  });
}

$("#tablaClientes").ready(function () {
  tablaCliente = $("#tablaClientes")
    .removeAttr("width")
    .DataTable({
      autoWidth: false,
      columnDefs: [
        { width: "120px", targets: 5 },
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
          data: "nombres_cliente",
          className: "nombre",
        },
        {
          data: "apellidos_clientes",
          className: "apellido",
        },
        {
          data: "numero_documento",
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
          data: "numero",
          className: "telefono-principal",
        },
        {
          data: "descripcion_nacionalidad",
          className: "nacionalidad",
        },
        {
          data: "estado",
          className: "estado ",
          render: function (data) {
            if (data == "1") {
              return "<span class='text-success' >Activo</span>";
            } else {
              return "<span class='text-danger'>Inactivo</span>";
            }
          },
        },
        {
          data: null,
          className: "action",
          defaultContent:
            "<button type='button' class='btn btn-secondary'> <i class='fas fa-eye'></i></button>",
        },
      ],
    });

  getClientes();
});

$("#btnLimpiarFiltros").on("click", function () {
  $("#filtroGeneral").val("");
  $("#filtroEstadoCivil, #filtroNacionalidad, #filtroEstado").val("");
  $("#rangoMin").val(0);
  $("#rangoMax").val($("#rangoMax").attr("max"));
  actualizarSlider();
});

$("#rangoMin, #rangoMax").on("input", actualizarSlider);

function actualizarSlider() {
  let minVal = parseInt($("#rangoMin").val());
  let maxVal = parseInt($("#rangoMax").val());
  const maxLimite = parseInt($("#rangoMax").attr("max"));

  // Evita que el mínimo supere al máximo
  if (minVal > maxVal) {
    [minVal, maxVal] = [maxVal, minVal];
    $("#rangoMin").val(minVal);
    $("#rangoMax").val(maxVal);
  }

  // Actualiza etiqueta con formato de moneda
  $("#etiquetaRangoCredito").text(
    `RD$ ${minVal.toLocaleString("en-US")} - RD$ ${maxVal.toLocaleString("en-US")}`,
  );

  // Colorea la barra activa entre ambos puntos
  const porc1 = (minVal / maxLimite) * 100;
  const porc2 = (maxVal / maxLimite) * 100;
  $("#sliderTrack").css(
    "background",
    `linear-gradient(to right, #dee2e6 ${porc1}%, #0d6efd ${porc1}%, #0d6efd ${porc2}%, #dee2e6 ${porc2}%)`,
  );
}
actualizarSlider();
obtenerNacionalidades();
function obtenerNacionalidades() {
  datos = {
    getNacionalidades: 1,
  };
  $.ajax({
    type: "GET",
    url: "../ajax/Nacionalidades.php",
    data: datos,
    success: function (datos) {
      result = JSON.parse(datos);
      $.each(result.data, function (i, d) {
        $(document)
          .find("#filtroNacionalidad")
          .append(
            "<option value='" +
              d.id_nacionalidad +
              "'>" +
              d.descripcion_nacionalidad +
              "</option>",
          );
      });
    },
  });
}

$("#btnBuscar").on("click", function (e) {
  e.preventDefault();

  getClientes();
});
