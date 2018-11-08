<div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            {{ csrf_field() }} {{ method_field('POST') }}

             <input type="hidden" id="id" name="id">

              <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label" for="nombre">Nombre</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text"  id="nombre" name="nombre" autofocus required>
                  <span class="help-block with-errors"></span>
                </div>
              </div>

              <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label" for="email">Email</label>
                <div class="col-sm-10">
                  <input class="form-control" type="email" id="email" name="email" required>
                  <span class="help-block with-errors"></span>
                </div>
              </div>

              <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label" for="username">Username</label>
                <div class="col-sm-10">
                  <input class="form-control" type="username" id="username" name="username" required>
                  <span class="help-block with-errors"></span>
                </div>
              </div>
              
             <div class="form-group form-group-lg">
                <label for="foto" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
                <input type="file" id="foto" name="foto" class="form-control">
                <span class="help-block with-errors"></span>
            </div>

              <button type="submit" class="btn btn-primary">Submit</button>

            </form>


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->