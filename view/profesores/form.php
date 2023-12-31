<div class="mb-3" <?php echo isset($this->datos->id)? "" :"hidden";?>>
  <label for="" class="form-label">Id</label>
  <input type="text" 
    class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="" 
    value="<?php echo isset($this->datos->id)? $this->datos->id :"";?>" <?php echo isset($this->datos->id)? "readonly" :"";?>>
  <small id="helpId" class="form-text text-muted">Help text</small>
</div>
    <div class="mb-3">
      <label for="" class="form-label">Cédula</label>
      <input type="text" required
        class="form-control" name="cedula" id="cedula" aria-describedby="helpId" placeholder="Ingrese la cedula del Profesor"
        value="<?php echo isset($this->datos->cedula)? $this->datos->cedula :"";?>">
      <small id="helpId" class="form-text text-muted">Cedula Profesor</small>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo Profesor</label>
        <input type="text" required
          class="form-control" name="correoelectronico" id="correoelectronico" aria-describedby="helpId" placeholder="Ingrese el correo electrónico del Profesor"
          value="<?php echo isset($this->datos->correoelectronico)? $this->datos->correoelectronico :"";?>">
        <small id="helpId" class="form-text text-muted">correoelectronico Profesor</small>
    </div>
      <div class="mb-3">
        <label for="" class="form-label">teléfono</label>
        <input type="text" required
          class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Ingrese el teléfono del Profesor"
          value="<?php echo isset($this->datos->telefono)? $this->datos->telefono :"";?>">
        <small id="helpId" class="form-text text-muted">telefono del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Teléfono Célular</label>
        <input type="text" required
          class="form-control" name="telefonocelular" id="telefonocelular" aria-describedby="helpId" placeholder="Ingrese el telefonocelular del Profesor"
          value="<?php echo isset($this->datos->telefonocelular)? $this->datos->telefonocelular :"";?>">
        <small id="helpId" class="form-text text-muted">telefonocelular del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Fecha Nacimiento</label>
        <input type="text" required
          class="form-control" name="fechanacimiento" id="fechanacimiento" aria-describedby="helpId" placeholder="Ingrese la fechanacimiento del Profesor"
          value="<?php echo isset($this->datos->fechanacimiento)? $this->datos->fechanacimiento :"";?>">
        <small id="helpId" class="form-text text-muted">fechanacimiento del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Sexo</label>
        <input type="text" required
          class="form-control" name="sexo" id="sexo" aria-describedby="helpId" placeholder="Ingrese el sexo del Profesor"
          value="<?php echo isset($this->datos->sexo)? $this->datos->sexo :"";?>">
        <small id="helpId" class="form-text text-muted">sexo del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">direccion</label>
        <input type="text" required
          class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="Ingrese la direccion del Profesor"
          value="<?php echo isset($this->datos->direccion)? $this->datos->direccion :"";?>">
        <small id="helpId" class="form-text text-muted">direccion del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">nombre</label>
        <input type="text" required
          class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre del Profesor"
          value="<?php echo isset($this->datos->nombre)? $this->datos->nombre :"";?>">
        <small id="helpId" class="form-text text-muted">nombre del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">apellidopaterno</label>
        <input type="text" required
          class="form-control" name="apellidopaterno" id="apellidopaterno" aria-describedby="helpId" placeholder="Ingrese el apellidopaterno del Profesor"
          value="<?php echo isset($this->datos->apellidopaterno)? $this->datos->apellidopaterno :"";?>">
        <small id="helpId" class="form-text text-muted">apellidopaterno del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">apellidomaterno</label>
        <input type="text" required
          class="form-control" name="apellidomaterno" id="apellidomaterno" aria-describedby="helpId" placeholder="Ingrese el apellidomaterno del Profesor"
          value="<?php echo isset($this->datos->apellidomaterno)? $this->datos->apellidomaterno :"";?>">
        <small id="helpId" class="form-text text-muted">apellidomaterno del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">nacionalidad</label>
        <input type="text" required
          class="form-control" name="nacionalidad" id="nacionalidad" aria-describedby="helpId" placeholder="Ingrese el nacionalidad del Profesor"
          value="<?php echo isset($this->datos->nacionalidad)? $this->datos->nacionalidad :"";?>">
        <small id="helpId" class="form-text text-muted">nacionalidad del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">idCarreras</label>
        <input type="text" required
          class="form-control" name="idCarreras" id="idCarreras" aria-describedby="helpId" placeholder="Ingrese el idCarreras del Profesor"
          value="<?php echo isset($this->datos->idcarreras)? $this->datos->idcarreras :"";?>">
        <small id="helpId" class="form-text text-muted">idCarreras del Profesor</small>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">usuario</label>
        <input type="text" required
          class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Ingrese el usuario del Profesor"
          value="<?php echo isset($this->datos->usuario)? $this->datos->usuario :"";?>">
        <small id="helpId" class="form-text text-muted">usuario del Profesor</small>
      </div>
      <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
      </div>