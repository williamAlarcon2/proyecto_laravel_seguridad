@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Rol</h4>
    @if ($errors->any())
      <div class=" col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="col-sm-8 col-md-offset-2" id="formulario">
      {{ Form::open(['route' => 'roles.store']) }}
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Nombre</label>
              <input type="text" name="name" class="form-control" id="name" value="{{ old('name')}}">
          </div>
        </div>
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-align-left fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Descripcion</label>
              <input type="text" name="description" class="form-control" id="description" value="{{ old('description')}}">
          </div>
        </div>
        <label style="font-size:16px;">Accesos del Rol</label>
        <div class="form-group">
          <div class="input-group separacion">
						<div class="checkbox-detailed">
							<input type="checkbox" name="special" value="all-access" id="check-det-1"/>
							<label for="check-det-1">
							<span class="checkbox-detailed-tbl">
								<span class="checkbox-detailed-cell">
									<span class="checkbox-detailed-title">Acceso Total</span>
								</span>
							</span>
							</label>
						</div>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="accesos_limitados">
              <label id="Accesos">Accesos Limitados</label>
            </button>
					</div>
        </div>
        <div class="collapse well table-responsive" id="collapseExample">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Modulo</th>
                <th>Listar</th>
                <th>Agregar</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $moduloAnterior= "";
                $moduloNuevo = "";
                $conta = 0;
              ?>
              @foreach($permissions as $permission)
                <?php
                  $modNew = explode('.', $permission->slug);
                  $moduloNuevo = $modNew[0];

                  if ($moduloAnterior != $moduloNuevo) {
                    if ($conta!=0) {
                      echo "</tr>";
                    }
                    echo '<tr><td>'.ucwords($moduloNuevo).'</td><td>';
                    ?>
                      {{ Form::checkbox('permissions[]', $permission->id, null) }}
                    <?php
                    echo '</td>';
                  }else {
                    echo '<td>';
                    ?>
                    {{ Form::checkbox('permissions[]', $permission->id, null) }}
                    <?php
                    echo '</td>';
                    //echo '<td><input type="checkbox" name="permissions[]" value="'.$permission->id.'"></td>';
                  }
                  $moduloAnterior = $moduloNuevo;
                  $conta++;
                ?>
              @endforeach
              <?php echo "</tr>"; ?>
            </tbody>
          </table>
        </div>
        <div class="input-group separacion">
          <button id="boton_formulario">Guardar</button>
    		</div>
      {{ Form::close() }}
    </div>
  @endsection
