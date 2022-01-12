<!-- Modal -->
<div class="modal fade" id="editMdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar ruta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" role="form" method="POST" id="editRouteFrm">
            @method('PUT')
            @csrf

            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="user_id" class="form-fields">Usuario</label>
                  <label class="mandatory-field">*</label>
                  <select class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}" name="user_id" id="user-id-edit" data-live-search="true" ></select>
                  @if($errors->has('user_id'))
                  <span class="text-danger">{{$errors->first('user_id')}}</span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="date_time" class="form-fields">Fecha/Hora</label>
                  <label class="mandatory-field">*</label>
                  <input type="datetime-local" class="form-control {{$errors->has('date') ? 'is-invalid' : ''}}" name="date_time" id="date-time-edit" placeholder="" value="{{old('date_time')}}" step="1">
                  @if($errors->has('date_time'))
                    <span class="text-danger">{{$errors->first('date_time')}}</span>
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