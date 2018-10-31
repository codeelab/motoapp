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
        var sheet = xlsx.xl.worksheets['personacyt.xml'];
        $('row c[r^="A"]', sheet).attr( 's', '50' ); //<-- left aligned text
        $('row c[r^="C"]', sheet).attr( 's', '55' ); //<-- wrapped text
        $('row:first c', sheet).attr( 's', '32' );
      }
    })
  ]
});
});

$(document).ready(function() {

 $("#UserTable").DataTable({
  responsive: true,
  processing: true,
  pagingType: "simple",
  "info": false,
  ordering: !1,
  pageLength: 5,
  orderCellsTop: !0,
  language: {
   url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
  }
 });
 $("#UserTable thead").on("click", ".form-control", function(e) {
  e.stopPropagation()
 }), $("#UserTable thead").on("keyup change", ".form-control", function(e) {
  var a = $(this).attr("data-column"),
   s = $(this).val();
  $("#UserTable").DataTable().columns(a).search(s).draw()
 });

  $('#UserTables').DataTable( {
      serverSide: true,
      ajax: "api/users",
      columns: [
        {data: 'id'},
        {data: 'nombre'},
        {data: 'a_paterno'},
        {data: 'a_materno'},
        {data: 'email'},
        {data: 'username'},
      ]
  } );

});
