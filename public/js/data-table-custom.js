//TABLA SOLO USUARIOS DE LA LISTA GENERAL CON 4 COLUMNAS

$(document).ready(function() {
    // Function to convert an img URL to data URL
    function getBase64FromImageUrl(url) {
    var img = new Image();
        img.crossOrigin = "anonymous";
    img.onload = function () {
        var canvas = document.createElement("canvas");
        canvas.width =this.width;
        canvas.height =this.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(this, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
    };
    img.src = url;
    }

var buttonCommon = {
  exportOptions: {
    format: {
      body: function(data, column, row) {
        data = data.replace(/<br\s*\/?>/ig, "\r\n");
        data = data.replace(/<.*?>/g, "");
        data = data.replace("&amp;", "&");
        data = data.replace("&nbsp;", "");
        data = data.replace("&nbsp;", "");
        return data;
      }
    }
  }
};
$.extend(true, $.fn.dataTable.defaults, {
  "lengthChange": false,
  "pageLength": 100,
  "orderClasses": false,
  "stripeClasses": [],
  dom: 'Bfrtip',
  buttons: [
  'print','csvHtml5', 'pdfHtml5',
    $.extend(true, {}, buttonCommon, {
      extend: 'excelHtml5',
      exportOptions: {
        columns: [0, 1, 2, 3, 4]
      },
      customize: function(xlsx) {
        var sheet = xlsx.xl.worksheets['gapps.xml'];
        $('row c[r^="A"]', sheet).attr( 's', '50' ); //<-- left aligned text
        $('row c[r^="C"]', sheet).attr( 's', '55' ); //<-- wrapped text
        $('row:first c', sheet).attr( 's', '32' );
      }
    })
  ]
});


 $("#UserTable").DataTable({
  responsive: true,
  info: false,
  pagingType: 'simple_numbers',
  dom: '<"toolbar">frtip',
  ordering: !1,
  pageLength: 5,
  orderCellsTop: !0,
  language: {
   url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
   "emptyTable":  "No hay datos disponibles en la tabla.",
   "zeroRecords": "No records to display",
   "loadingRecords": "Cargando...",
   "processing":     "Procesando...",
   "search":         "Buscar:",
   "searchPlaceholder": "Dato para buscar",
   "zeroRecords": "No se han encontrado coincidencias."
  }
 });

});