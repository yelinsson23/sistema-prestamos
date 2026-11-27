//variable global de la tabla consulta cliente
var tablaCliente;

// funcion para obtener clientes con ajax
function getClientes() {
  //filtros de busqueda
  parametros = {
    input: $("#filtroGeneral").val(),
    estado_civil: $("#filtroEstadoCivil").val(),
    nacionalidad: $("#filtroNacionalidad").val(),
    garante: $("#filtroClienteGarante").val(),
    estado: $("#filtroEstado").val(),
    rangoMin: $("#rangoMin").val(),
    rangoMax: $("#rangoMax").val(),
  };
  //variable de datos que se manda al servidor
  var datos = {
    getClientes: 1,
    parametros: parametros,
  };

  $.ajax({
    type: "GET",
    url: "../ajax/Clientes.php",
    data: datos,
    beforeSend: function (objeto) {
      //funcion que permite ejecutar una accion al momento de que se manda el ajax
    },
    success: function (datos) {
      //funcion que permite ejecutar un accion cuando el ajax responda

      //limpiar la tabla
      tablaCliente.clear().draw();
      //convertir la respusta del servidor de Json a tipo objeto
      result = JSON.parse(datos);

      console.log(result);

      if (result.data != null) {
        //llenera los datos de la tabla con la respuesta del servidor
        tablaCliente.rows.add(result.data).draw();
      }
    },
  });
}

//funciona que se ejecuta cuando carga el HTML de la tabla cliente con id #tablaClientes
$("#tablaClientes").ready(function () {
  //inicializar la tabla con DataTable
  tablaCliente = $("#tablaClientes")
    .removeAttr("width")
    .DataTable({
      //parametros personalizables de DataTable

      autoWidth: false, // perimite definir manualmente el tamaño de las columnas
      columnDefs: [
        { width: "120px", targets: 5 }, //definimos un tamaño especifico a la columna limite de credito
        //ocultar columna ID
        {
          targets: [0], // Índice de la columna a ocultar (0 es la primera, 8 sería la novena)
          visible: false, // La oculta visualmente sin romper los anchos de la tabla
        },
      ],
      //ordenar de forma ascedente por defecto una columna,en este caso Nombre
      order: [[1, "asc"]],
      deferRender: true,
      scrollToTop: false,
      /*
        l - length changing input control
        f - filtering input
        t - The table!
        i - Table information summary
        p - pagination control
        r - processing display element
      */
      dom: "lrtip",

      //definir las columnas de la tabla, misma cantidad de columnas que el HTML
      columns: [
        {
          //definir un key/indice de referencia para que interprete el valor a monstras mediante el objeto que recibe de rows.add().draw()
          data: "id_cliente",
          //clase que se le asigna a la columna completa de registros
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
          //funcion intermediaria para manipular la data de esa columna
          render: function (data) {
            //devolver una etiqueta span con texto Activo/Inactivo de color verde/rojo
            if (data == "1") {
              return "<span class='text-success' >Activo</span>";
            } else {
              return "<span class='text-danger'>Inactivo</span>";
            }
          },
        },
        {
          //definir columna que no va a resivir datos dinamicos
          data: null,
          className: "action",
          //valor por defecto que mostrara en cada registro de la tabla
          defaultContent:
            "<button type='button' class='btn btn-secondary'> <i class='fas fa-eye'></i></button>",
        },
      ],
    });
  //llamar a la funcion despues de inicializar DataTabla
  getClientes();
});

//evento que se ejecuta cuando se le da click al boton limpiar filtros
$("#btnLimpiarFiltros").on("click", function () {
  $("#filtroGeneral").val("");
  $("#filtroEstadoCivil, #filtroNacionalidad, #filtroEstado").val("");
  $("#rangoMin").val(0);
  $("#rangoMax").val($("#rangoMax").attr("max"));
  actualizarSlider();
});

//evento que se ejecuta cada que se desplaza el slider
$("#rangoMin, #rangoMax").on("input", actualizarSlider);

//Control visual y lógico del Slider Doble
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

//funcion para obtener las nacionalidades y ponerlas como opcion en el select
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
      //recorre el objeto, donde i es el indice, d es el valor
      $.each(result.data, function (i, d) {
        //busca (.find) en el documento DOM (document) el elemneto de id #filtroNacionalidad y agrega las opciones (option)
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

$("#btnBuscar").on("click", function () {
  getClientes();
});
