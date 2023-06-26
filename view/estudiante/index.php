<?php
    require 'view/header.php';
    require 'view/menu.php';
?>
<div class="container-fluid" id="contendorprincipal">
    <h1><?php echo $this->mensaje;?></h1>
    
    <?php echo $this->mensajeResultado ?>
    <div class="table-responsive">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-secondary
        align-middle">
            <thead class="table-light">
                <caption><?php echo $this->mensaje;?></caption>
                <tr>
                    <th>Id</th>
                    <th>Cedula</th>
                    <th>correoelectronico</th>
                    <th>telefono</th>
                    <th>telefonocelular</th>
                    <th>fechanacimiento</th>
                    <th>sexo</th>
                    <th>direccion</th>
                    <th>nombre</th>
                    <th>apellidopaterno</th>
                    <th>apellidomaterno</th>
                    <th>nacionalidad</th>
                    <th>idCarreras</th>
                    <th>usuario</th>
                    <th>Acciones</th>

                </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php 
                        foreach ($this->datos as $row) {

                            $datos = new classEstudiantes();
                            $datos = $row;
                            # code..
                            echo ' <tr class="table-secondary" >
                                    <td scope="row">'.$datos->id.'</td>
                                    <td>'.$datos->cedula.'</td>
                                    <td>'.$datos->correoelectronico.'</td>
                                    <td>'.$datos->telefono.'</td>
                                    <td>'.$datos->telefonocelular.'</td>
                                    <td>'.$datos->fechanacimiento.'</td>
                                    <td>'.$datos->sexo.'</td>
                                    <td>'.$datos->direccion.'</td>
                                    <td>'.$datos->nombre.'</td>
                                    <td>'.$datos->apellidopaterno.'</td>
                                    <td>'.$datos->apellidomaterno.'</td>
                                    <td>'.$datos->nacionalidad.'</td>
                                    <td>'.$datos->idCarreras.'</td>
                                    <td>'.$datos->usuario.'</td>
                                    <td>
                                        <a name="eliminar" id="eliminar" class="btn btn-danger" href="'.constant('URL').'estudiantes/eliminarEstudiantes/'.$datos->id.'" role="button">Eliminar</a>
                                        ||
                                        <a name="editar" id="editar" class="btn btn-primary" href="'.constant('URL').'estudiantes/verEstudiante/'.$datos->id.'" role="button">Editar</a>
                                    </td>
                                </tr>';
                        }
                    ?>
                </tbody>
                <tfoot>
                    
                </tfoot>
        </table>
    </div>    
</div>
<?php
    require 'view/footer.php';
?>