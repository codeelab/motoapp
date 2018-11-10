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

//LISTA EL CONTENIDO DE LOS USUARIOS EN EL SISTEMA
  $('#UserTable').DataTable( {
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
        {data: 'show_photo', name: 'show_photo'},
        {data: 'nombre', name: 'nombre'},
        {data: 'email', name: 'email'},
        {data: 'username', name: 'username'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
  });




});

//AGREGAR USUARIOS  DESDE DATATABLES
      function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Agregar Usuario');
      }


//EDITA A LOS USUARIOS POR ID DESDE DATATABLES
      function editForm(id) 
      {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "users" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edición de Usuarios');
            $('#id').val(data.id);
            $('#nombre').val(data.nombre);
            $('#email').val(data.email);
            $('#username').val(data.username);
          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

//ELIMINA A LOS USUARIOS POR ID DESDE DATATABLES

function deleteData(id){
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
swal({
                        title: "Estas seguro?",
                        text: "Si eliminas el Ticket, se movera a la papelera!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sí, Eliminar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm){
                            $.ajax({
                            type : "POST",
                            data : {'_method' : 'DELETE', '_token' : csrf_token},
                            url: "users" + '/' + id,
                            }).done(function(data) {
                            swal({
                              title: 'Eliminado!',
                              text: data.message,
                              type: 'success',
                              timer: '1500'
                            }).then(function(){ 
                                location.reload(); //verificar la opcion de refresco al eliminar
                            });
                            }).fail(function(data){
                            swal({
                              title: 'Error!',
                              text: data.message,
                              type: 'error',
                              timer: '1500'
                            })
                            });

                        }
                    });
}

      function deleteDatas(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
                        title: "Estas seguro?",
                        text: "Si eliminas el Ticket, se movera a la papelera!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sí, Eliminar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: false,
          }).then(function () {
              $.ajax({
                  url: "users" + '/' + id,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token},
                  success : function(data) {
                      table.ajax.reload();
                      swal({
                          title: 'Eliminado!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                      })
                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
          });
        }

      $(document).ready(function() {
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "users";
                    else url: "users" + '/' + id,
                    $.ajax({
                        url : url,
                        type : "POST",
                       //data : $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                icon: "success",
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });

// ejemplo de crud ajax
//https://github.com/weeework/laravel-ajax/blob/master/resources/views/welcome.blade.php
// youtube
//Laravel 5.5 AJAX CRUD Bootstrap with Validation - 2 Datatables Serverside Yajra
//plantilla ablepro-lite 