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

  $('#UserTabless').DataTable( {
      responsive: true,
      processing: true,
      serverSide: true,
      pagingType: "simple",
      "info": false,
      ordering: !1,
      pageLength: 5,
      orderCellsTop: !0,
      language: {
        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      },
      ajax: "api/users",
      columns: [
        {data: 'id', name: 'id'},
        {data: 'nombre', name: 'nombre'},
        {data: 'email', name: 'email'},
        {data: 'username', name: 'username'},
        {data: null,  render: function ( data, type, row ) {
                return "<a href='users/"+data.id+"/show'><button type='button' class='btn btn-sm btn-default btn-icon waves-effect waves-light' data-toggle='tooltip' data-placement='top' title='Ver' data-original-title='Ver'><i class='fas fa-eye'></i></button></a><a href='users/"+data.id+"/edit'><button type='button' class='btn btn-sm btn-info btn-icon waves-effect waves-light' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Edición'><i class='fas fa-edit'></i></button></a><a href='users/"+data.id+"/destroy'><button type='button' class='btn btn-sm btn-danger btn-icon waves-effect waves-light' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='fas fa-trash-alt'></i></button></a>"  }
        }
      ]
  });
  $("#UserTabless thead").on("click", ".form-control", function(e) {
      e.stopPropagation()
     }), $("#UserTabless thead").on("keyup change", ".form-control", function(e) {
      var a = $(this).attr("data-column"),
       s = $(this).val();
      $("#UserTabless").DataTable().columns(a).search(s).draw()
  });




});
