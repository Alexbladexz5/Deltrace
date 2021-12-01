<!-- Modal -->
<div class="modal fade" id="createMdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('users.store')}}" role="form" method="POST" id="createUserFrm">
            {{csrf_field()}}

            <div class="row">
              <div class="col-lg-6 form-group">
                <div>
                  <label for="name" class="form-fields">Nombre</label>
                  <label class="mandatory-field">*</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="-">
                  
                </div>
              </div>

              <div class="col-lg-6 form-group">
                <div>
                  <label for="last_names" class="form-fields">Apellidos</label>
                  <label class="mandatory-field">*</label>
                  <input type="text" class="form-control" name="last_names" id="last_names" placeholder="-">
                  
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="email" class="form-fields">Email</label>
                  <label class="mandatory-field">*</label>
                  <input type="email" class="form-control" name="email" id="email"">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="password" class="form-fields">Contraseña</label>
                  <label class="mandatory-field">*</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
              </div>
            </div>

            <div class="buttons-form-submit d-flex justify-content-end">
              <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">Cerrar</button>
              <button type="submit" href="#" class="btn btn-dark">
                Guardar
                <i class="fas fa-spinner fa-spin d-none"></i>
              </button>
            </div>

          </form>
        </div>
        
      </div>
    </div>
  </div>