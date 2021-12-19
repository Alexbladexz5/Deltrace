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
                  <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name-create" placeholder="Tu nombre aquí" value="{{old('name')}}">
                  @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>
              </div>

              <div class="col-lg-6 form-group">
                <div>
                  <label for="last_name" class="form-fields">Apellidos</label>
                  <label class="mandatory-field">*</label>
                  <input type="text" class="form-control {{$errors->has('last_name') ? 'is-invalid' : ''}}" name="last_name" id="last-name-create" placeholder="Tus apellidos aquí" value="{{old('last_name')}}">
                  @if($errors->has('last_name'))
                    <span class="text-danger">{{$errors->first('last_name')}}</span>
                  @endif
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="email" class="form-fields">Email</label>
                  <label class="mandatory-field">*</label>
                  <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" id="email-create" placeholder="usuario@ejemplo.com" value="{{old('email')}}">
                  @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="password" class="form-fields">Contraseña</label>
                  <label class="mandatory-field">*</label>
                  <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" id="password-create">
                  @if($errors->has('password'))
                    <span class="text-danger">{{$errors->first('password')}}</span>
                  @endif
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