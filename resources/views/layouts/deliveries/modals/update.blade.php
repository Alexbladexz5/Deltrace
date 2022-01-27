<!-- Modal -->
<div class="modal fade" id="editMdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar entrega</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" role="form" method="POST" id="editDeliveryFrm">
            @method('PUT')
            @csrf

            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="route_id" class="form-fields">Ruta</label>
                  <label class="mandatory-field">*</label>
                  <select class="form-control {{$errors->has('route_id') ? 'is-invalid' : ''}}" name="route_id" id="route-id-edit" data-live-search="true" ></select>
                  @if($errors->has('route_id'))
                  <span class="text-danger">{{$errors->first('route_id')}}</span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="name" class="form-fields">Nombre</label>
                  <label class="mandatory-field">*</label>
                  <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name-edit" placeholder="Entrega XX" value="{{old('name')}}">
                  @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>
              </div>

              <div class="col-lg-12 form-group">
                <div>
                  <label for="address" class="form-fields">Dirección</label>
                  <label class="mandatory-field">*</label>
                  <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" name="address" id="address-edit" placeholder="" value="{{old('address')}}">
                  @if($errors->has('address'))
                    <span class="text-danger">{{$errors->first('address')}}</span>
                  @endif
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="coordinates" class="form-fields">Coordenadas</label>
                  <label class="mandatory-field">*</label>
                  <div class="input-group">
                    <input type="text" class="form-control {{$errors->has('coordinates') ? 'is-invalid' : ''}}" name="coordinates" id="coordinates-edit" placeholder="" value="{{old('coordinates')}}">
                  @if($errors->has('coordinates'))
                    <span class="text-danger">{{$errors->first('coordinates')}}</span>
                  @endif
                  {{-- Ventana modal para añadir mapas --}}
                  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addCoordinates" onclick="modalCoordinates('edit')">
                    <i class="fas fa-map-marker-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 form-group">
                <div>
                  <label for="estimated_time" class="form-fields">Fecha de entrega</label>
                  <label class="mandatory-field">*</label>
                  <input type="datetime-local" class="form-control {{$errors->has('estimated_time') ? 'is-invalid' : ''}}" name="estimated_time" id="estimated-time-edit" step="1">
                  @if($errors->has('estimated_time'))
                    <span class="text-danger">{{$errors->first('estimated_time')}}</span>
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